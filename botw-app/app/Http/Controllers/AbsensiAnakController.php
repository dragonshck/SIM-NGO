<?php

namespace App\Http\Controllers;

use App\Models\AbsensiAnak;
use Illuminate\Http\Request;

class AbsensiAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AbsensiAnak::groupBy('periode')->orderBy('periode', 'desc')
            ->get();
        return view('anak.absensi.absensianak', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anak.absensi._inputabsen');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AbsensiAnak  $absensiAnak
     * @return \Illuminate\Http\Response
     */
    public function show(AbsensiAnak $absensiAnak)
    {
        return view('anak.absensi._detailabsen');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AbsensiAnak  $absensiAnak
     * @return \Illuminate\Http\Response
     */
    public function edit(AbsensiAnak $absensiAnak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AbsensiAnak  $absensiAnak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AbsensiAnak $absensiAnak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AbsensiAnak  $absensiAnak
     * @return \Illuminate\Http\Response
     */
    public function destroy(AbsensiAnak $absensiAnak)
    {
        //
    }
}
