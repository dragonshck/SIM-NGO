<?php

namespace App\Http\Controllers;

use App\Models\KelompokUmur;
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
        $staff = StaffPPA::with('user', 'jabatan')->get();
        return view('staff.list', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = \DB::table('roles')->whereNotIn('name', ['anak'])->get();
        $kelompok_umur = KelompokUmur::get();
        return view('staff.create', compact('jabatan', 'kelompok_umur'));
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
            'phone'             => 'required|string|max:255',
            'dateofbirth'       => 'required|date',
            'current_addr'   => 'required|string|max:255',
            'perm_addr' => 'required|string|max:255'
        ]);

        $register = [
            'name' => $request ->name,
            'email' => $request ->email,
            'password' => Hash::make($request->password),
            'phone' => $request ->phone,
            'dateofbirth' => $request ->dateofbirth,
            'current_addr' => $request ->current_addr,
            'perm_addr' => $request ->perm_addr,
            'jabatan_staff_id' => $request->jabatan_staff_id,
            'kelompok_umur_id' => $request->kelompok_umur_id
        ];
        // dd($register, $request->all());
        // dd(Auth::user()->id);
        // $userIdAssign = auth()->user()->id;
        // dd($register);

        // dd($userIdAssign);
        // DB::table('model_has_roles')
        // ->where('model_id', $request->userid)
        // ->update(['role_id' =>  $request->editusertype]);
        

        $user = User::create($register);


        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug($user->name) . '-' . $user->id . '.' . $request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('images/profile'), $profile);
        } else {
            $profile = 'avatar.png';
        }
        $user->update([
            'profile_picture' => $profile
        ]);

        if($user){
            $register['user_id'] = $user->id;
            StaffPPA::create($register);
            $assignPermission = \DB::table('model_has_roles')->insert(['role_id' => $request->jabatan_staff_id, 'model_type' => 'App\Models\User' ,'model_id' => $user->id]);

            // $get_staff = \DB::
        }
        

        // $user->teacher()->create([
        //     'gender'            => $request->gender,
        //     'phone'             => $request->phone,
        //     'dateofbirth'       => $request->dateofbirth,
        //     'current_addr'   => $request->current_address,
        //     'perm_addr' => $request->permanent_address
        // ]);

        return redirect()->route('staff.index');
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
        $staff = StaffPPA::with('user')->findOrFail($staffPPA->id);
        return view('staff.update', compact('staff'));
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
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users,email,' . $staffPPA->user_id,
            'gender'            => 'required|string',
            'phone'             => 'required|string|max:255',
            'dateofbirth'       => 'required|date',
            'current_addr'   => 'required|string|max:255',
            'perm_addr' => 'required|string|max:255'
        ]);

        $user = User::findOrFail($staffPPA->user_id);

        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug($user->name) . '-' . $user->id . '.' . $request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('images/profile'), $profile);
        } else {
            $profile = $user->profile_picture;
        }

        $user->update([
            'name'              => $request->name,
            'email'             => $request->email,
            'profile_picture'   => $profile
        ]);

        $user->staff()->update([
            'gender'            => $request->gender,
            'phone'             => $request->phone,
            'dateofbirth'       => $request->dateofbirth,
            'current_address'   => $request->current_address,
            'permanent_address' => $request->permanent_address
        ]);

        return redirect()->route('staff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StaffPPA  $staffPPA
     * @return \Illuminate\Http\Response
     */
    public function destroy(StaffPPA $staffPPA)
    {
        $user = User::findOrFail($staffPPA->user_id);

        $user->teacher()->delete();

        $user->removeRole('tutor');

        if ($user->delete()) {
            if ($user->profile_picture != 'avatar.png') {
                $image_path = public_path() . '/images/profile/' . $user->profile_picture;
                if (is_file($image_path) && file_exists($image_path)) {
                    unlink($image_path);
                }
            }
        }

        return redirect()->route('staff.index');
    }
}
