<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Personnel;
use App\Http\Requests\CreatePersonnelRequest;
use Illuminate\Support\Facades\DB;

class PersonnelController extends Controller
{
    /**
     * Show all Personnel (Staff,Workers,Contractors).
     **
     */
    public function index()
    {
        $users = User::where('business_id', auth()->user()->business_id)->paginate(2);
        return view('personnel.index', compact('users'));
    }

    public function newPersonnel()
    {
        $roles = Role::where('name', '!=', 'Super Admin')->where('name', '!=', 'Client')->get();
        return view('personnel.new-personnel', compact('roles'));
    }

    /**
     * Create new Personnel (Staff,Workers,Contractors).
     **
     */
    public function createPersonnel(CreatePersonnelRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validateData = $request->all();

            $user = User::create([
                'name' => $validateData['firstname'] . ' ' . $validateData['surname'],
                'email' => $validateData['email'],
                'password' => bcrypt($validateData['password']),
                'phone_number' => $validateData['phone_number'] ?? null,
                'business_id' => auth()->user()->business_id,
                'status' => 'Active',
                'category' => $validateData['category'] ?? 'staff',
            ]);

            // Assign role
            $role = Role::find($validateData['role']);
            if ($role) {
                $user->assignRole($role->name);
            }

            $validateData['business_id'] = auth()->user()->business_id;
            $validateData['user_id'] = $user->id;
            // Generate unique staff ID // THIS IS BEING HANDLED IN THE MODEL
            // $validateData['staff_id'] = Personnel::generateUniqueStaffId();

            // file uploads if they exist
            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                $datePrefix = date('d-m-Y');
                $filename = $datePrefix . '_' . $file->getClientOriginalName();
                $validateData['picture'] = $file->storeAs('personnel/pictures', $filename, 'public');
            }
            if ($request->hasFile('cv')) {
                $file = $request->file('cv');
                $datePrefix = date('d-m-Y');
                $filename = $datePrefix . '_' . $file->getClientOriginalName();
                $validateData['cv'] = $file->storeAs('personnel/cv', $filename, 'public');
            }

            // Remove fields not needed for Personnel
            unset($validateData['password'], $validateData['role'], $validateData['category'], $validateData['save1']);
            // Create personnel record
            Personnel::create($validateData);
        });

        return redirect()->route('home')->with('success', 'Personnel created successfully.');
        
    }

    /**
     * Show Edit Personnel (Staff,Workers,Contractors).
     **
     */
    public function editPersonnel($user)
    {
        $user = User::findOrFail($user);
        $roles = Role::where('name', '!=', 'Super Admin')->where('name', '!=', 'Client')->get();
        return view('personnel.edit-personnel', compact('user', 'roles'));
    }


}
