<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $allroles = Role::all();
        return view('dangerzone.role.index', compact('allroles'));
    }

    public function create()
    {
        # code...
    }
}
