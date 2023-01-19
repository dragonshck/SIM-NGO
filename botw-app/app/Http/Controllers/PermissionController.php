<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $allperm = Permission::all();
        return view('dangerzone.permission.index', compact('allperm'));
    }
}
