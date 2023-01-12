<?php

namespace App\Http\Controllers;

use App\Models\StaffPPA;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StaffPPAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = StaffPPA::with('user')->latest()->paginate(10);
        return view('staff.list', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users',
            'password'          => 'required|string|min:8',
            'gender'            => 'required|string',
            'phone'             => 'required|string|max:255',
            'dateofbirth'       => 'required|date',
            'current_address'   => 'required|string|max:255',
            'permanent_address' => 'required|string|max:255'
        ]);

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);

        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug($user->name) . '-' . $user->id . '.' . $request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('images/staffprofile'), $profile);
        } else {
            $profile = 'avatar.png';
        }
        $user->update([
            'profile_picture' => $profile
        ]);

        $user->teacher()->create([
            'gender'            => $request->gender,
            'phone'             => $request->phone,
            'dateofbirth'       => $request->dateofbirth,
            'current_address'   => $request->current_address,
            'permanent_address' => $request->permanent_address
        ]);

        return redirect()->route('master-staff');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StaffPPA  $staffPPA
     * @return \Illuminate\Http\Response
     */
    public function show(StaffPPA $staffPPA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StaffPPA  $staffPPA
     * @return \Illuminate\Http\Response
     */
    public function edit(StaffPPA $staffPPA)
    {
        return view('staff.update');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StaffPPA  $staffPPA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StaffPPA $staffPPA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StaffPPA  $staffPPA
     * @return \Illuminate\Http\Response
     */
    public function destroy(StaffPPA $staffPPA)
    {
        //
    }
}
