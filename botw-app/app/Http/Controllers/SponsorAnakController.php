<?php

namespace App\Http\Controllers;

use App\Models\SponsorAnak;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SponsorAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = SponsorAnak::all();
        return view('sponsor.masterz.listdatasponsor', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('sponsor.masterz.createdatasponsor');
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
            'nama_sponsor'      => 'required|string|max:255',
            'origin_country'    => 'required|string|max:255'
        ]);

        $user = SponsorAnak::create([
            'nama_sponsor'       => $request->nama_sponsor,
            'origin_country'     => $request->origin_country
        ]);


        if ($request->hasFile('fotoprofil')) {
            $profile1 = Str::slug($user->name) . '-' . $user->id . '.' . $request->fotoprofil->getClientOriginalExtension();
            $request->fotoprofil->move(public_path('images/profile'), $profile1);
        } else {
            $profile1 = 'avatar.png';
        }



        if ($request->hasFile('fotocover')) {
            $profile2 = Str::slug($user->name) . '-' . $user->id . '.' . $request->fotocover->getClientOriginalExtension();
            $request->fotocover->move(public_path('images/cover_profile'), $profile2);
        } else {
            $profile2 = 'avatar.png';
        }

        $user->update([
            'fotoprofil' => $profile1,
            'fotocover' => $profile2,
        ]);

        return redirect()->route('sponsormaster.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SponsorAnak  $sponsorAnak
     * @return \Illuminate\Http\Response
     */
    public function show(SponsorAnak $sponsorAnak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SponsorAnak  $sponsorAnak
     * @return \Illuminate\Http\Response
     */
    public function edit(SponsorAnak $sponsorAnak)
    {
        return view('sponsor.masterz.updatedatasponsor');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SponsorAnak  $sponsorAnak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SponsorAnak $sponsorAnak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SponsorAnak  $sponsorAnak
     * @return \Illuminate\Http\Response
     */
    public function destroy(SponsorAnak $sponsorAnak)
    {
        //
    }
}
