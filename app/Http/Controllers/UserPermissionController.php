<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Services\GroupPermissions;

class UserPermissionController extends Controller
{
    protected $groupPermissions;

    public function __construct(GroupPermissions $groupPermissions) {
        $this->groupPermissions = $groupPermissions;
    }

    /**
     * Display a listing of the users with their roles and permissions.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        $roles = Role::where('name', '!=', 'Super Admin')->where('name', '!=', 'Client')->get();
        $users = User::with('roles', 'permissions')->paginate(10);
        return view('users.index', compact('users', 'roles'));
    }

    public function edit(User $user) {
        $roles = Role::where('name', '!=', 'Super Admin')->where('name', '!=', 'Client')->get();
        $users = User::with('roles', 'permissions')->paginate(10);
        $groupPermissions = $this->groupPermissions->permission();
        return view('users.user-roles', compact('user', 'users', 'roles', 'groupPermissions'));
    }

    public function update(Request $request, User $user) {
        $user->syncRoles($request->roles);
        $user->syncPermissions($request->permissions);
        return redirect()->route('users.index');
    }
}