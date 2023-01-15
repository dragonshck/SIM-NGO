<?php

namespace App\Http\Controllers;

use App\Models\AnakPPA;
use App\Models\SponsorAnak;
use App\Models\StaffPPA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Auth\Access\Gate;

class dashboard extends Controller
{
    use HasRoles;
    public function index()
    {
        $user = Auth::user();
        $data_anak  = AnakPPA::get()->count();
        $data_staff = StaffPPA::get()->count();
        $data_sp = SponsorAnak::get()->count();

        return view('dashboard', compact('data_anak', 'data_staff', 'data_sp'));

        if ($user->can('read access anak')) {

            $student = AnakPPA::with(['user', 'sponsor', 'kelompokumur', 'attendances'])->findOrFail($user->anak->id);

            return view('home', compact('student'));
        } else {
            return 'NO ROLE ASSIGNED YET!';
        }
    }
}
