<?php

namespace App\Http\Controllers;

use App\Models\AnakPPA;
use App\Models\KelompokUmur;
use App\Models\SponsorAnak;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class AnakPPAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AnakPPA::with('kelompokumur')->latest()->paginate(10);
        return view('anak.child', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_ku = KelompokUmur::latest()->get();
        $data_sp = SponsorAnak::latest()->get();
        return view('anak.tambahchild', compact('data_ku', 'data_sp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name'              => 'required|string|max:255',
        //     'email'             => 'required|string|email|max:255|unique:users',
        //     'password'          => 'required|string|min:8',
        //     'sponsor_anak_id'         => 'required|numeric',
        //     'kelompok_umur_id'          => 'required|numeric',
        //     'gender'            => 'required|string',
        //     'phone'             => 'required|string|max:255',
        //     'dateob'       => 'required|date',
        //     'current_addr'   => 'required|string|max:255',
        //     'perm_addr' => 'required|string|max:255'
        // ]);
        $request->all();
        // dd($request->toArray());

        $user = User::create([
            'name'              => $request->name,
            'email'             => $request->email,
            'password'          => Hash::make($request->password)
        ]);

        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug($user->name) . '-' . $user->id . '.' . $request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('images/profile'), $profile);
        } else {
            $profile = 'avatar.png';
        }
        $user->update([
            'profile_picture' => $profile
        ]);

        $user->anak()->create([
            'sponsor_anak_id'         => $request->sponsor_anak_id,
            'kelompok_umur_id'        => $request->kelompok_umur_id,
            'gender'                  => $request->gender,
            'phone'                   => $request->phone,
            'dateob'                  => $request->dateob,
            'current_addr'            => $request->current_addr,
            'perm_addr'               => $request->perm_addr
        ]);

        $user->assignRole('anak');

        return redirect()->route('anak.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnakPPA  $anakPPA
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data = AnakPPA::with('kelompokumur')->where('id', $id)->first();
        // dd($data->toArray());
        // $data = DB::table('anakppa')
        //     ->select('anakppa.*', 'kelompok_umur.*', 'sponsor_anaks.*', 'tutor.*', 'users.*', 'users_anakppa.*')
        //     ->join('kelompok_umur', 'anakppa.kelompok_umur_id', '=', 'kelompok_umur.id')
        //     ->join('sponsor_anaks', 'anakppa.sponsor_anak_id', '=', 'sponsor_anaks.id')
        //     ->join('tutor', 'kelompok_umur.tutor_anak_id', '=', 'tutor.id')
        //     ->join('users', 'tutor.tutor_id', '=', 'users.id')
        //     ->join('users as users_anakppa', 'anakppa.user_id', '=', 'users_anakppa.id')
        //     ->where('anakppa.id', $id)
        //     ->first();
        $data = DB::table('anakppa')
            ->select('anakppa.*', 'kelompok_umur.*', 'sponsor_anaks.*', 'staff_p_p_a_s.*', 'users.*', 'users_anakppa.*')
            ->leftJoin('kelompok_umur', 'anakppa.kelompok_umur_id', '=', 'kelompok_umur.id')
            ->leftJoin('sponsor_anaks', 'anakppa.sponsor_anak_id', '=', 'sponsor_anaks.id')
            ->leftJoin('staff_p_p_a_s', 'kelompok_umur.id', '=', 'staff_p_p_a_s.kelompok_umur_id')
            ->leftJoin('users', 'staff_p_p_a_s.user_id', '=', 'users.id')
            ->leftJoin('users as users_anakppa', 'anakppa.user_id', '=', 'users_anakppa.id')
            ->where('anakppa.id', $id)
            ->first();
        return view('anak.detailchild', compact('data', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnakPPA  $anakPPA
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data =  AnakPPA::with('user')->findOrFail($id);
        $gender = $data->gender;
        if ($gender == 'male') {
            $gender = 'Laki-Laki';
        } else {
            $gender = 'Perempuan';
        }
        $datasponsor = AnakPPA::with('sponsor')->findOrFail($id);

        $data_ku = KelompokUmur::with('tutor', 'anakku')->latest()->get();
        $kelompokumurskrg = $data->kelompok_umur_id;
        if ($kelompokumurskrg == 1) {
            $kelompokumurskrg = 'Taman Kanak-Kanak';
        } elseif ($kelompokumurskrg == 2) {
            $kelompokumurskrg = 'Sekolah Dasar';
        } elseif ($kelompokumurskrg == 3) {
            $kelompokumurskrg = 'Sekolah Menengah Pertama';
        } elseif ($kelompokumurskrg == 4) {
            $kelompokumurskrg = 'SMA-K / Kuliah';
        }

        $sponsorskrg = AnakPPA::with('sponsor')->find($id);
        // dd($sponsorskrg->toArray());
        $data_sp = SponsorAnak::with('sponsoranak')->latest()->get();
        return view('anak.editchild', compact('data', 'datasponsor', 'data_ku', 'data_sp', 'id', 'gender', 'kelompokumurskrg', 'sponsorskrg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnakPPA  $anakPPA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $getAnakId = AnakPPA::with('user')->find($id);

        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users,email,' . $getAnakId->user_id,
            'sponsor_anak_id'         => 'required|numeric',
            'kelompok_umur_id'          => 'required|numeric',
            'gender'            => 'required|string',
            'phone'             => 'required|string|max:255',
            'dateob'       => 'required|date',
            'current_addr'   => 'required|string|max:255',
            'perm_addr' => 'required|string|max:255'
        ]);



        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug($getAnakId->user->name) . '-' . $getAnakId->user->id . '.' . $request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('images/profile'), $profile);
        } else {
            $profile = $getAnakId->user->profile_picture;
        }

        $getAnakId->user()->update([
            'name'              => $request->name,
            'email'             => $request->email,
            'profile_picture'   => $profile
        ]);

        $getAnakId->update([
            'sponsor_anak_id'         => $request->sponsor_anak_id,
            'kelompok_umur_id'        => $request->kelompok_umur_id,
            'gender'                  => $request->gender,
            'phone'                   => $request->phone,
            'dateob'                  => $request->dateob,
            'current_addr'            => $request->current_addr,
            'perm_addr'               => $request->perm_addr
        ]);

        return redirect()->route('anak.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnakPPA  $anakPPA
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnakPPA $anakPPA)
    {
        //
    }
}
