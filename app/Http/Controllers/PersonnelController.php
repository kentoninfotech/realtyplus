<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PersonnelController extends Controller
{
    /**
     * Show show Personnel (Staff,Workers,Contractors).
     **
     */
    public function showStaff()
    {
        //
    }

    public function newPersonnel()
    {
        $roles = Role::where('name', '!=', 'Super Admin')->where('name', '!=', 'Client')->get();
        return view('personnel.new-personnel', compact('roles'));
    }


}
