<?php

namespace App\Http\Controllers;

use App\Models\kodeabsensi;
use Illuminate\Http\Request;

class KodeabsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kodeabsensi::all();
        // dd($data);
        return view('kodeabsen.kodeabsensianak', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kodeabsen.formtambahKA');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        kodeabsensi::create($request->all());
        return redirect()->route('kodeabsensi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kodeabsensi  $kodeabsensi
     * @return \Illuminate\Http\Response
     */
    public function show(kodeabsensi $kodeabsensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kodeabsensi  $kodeabsensi
     * @return \Illuminate\Http\Response
     */
    public function edit(kodeabsensi $kodeabsensi)
    {
        $data = kodeabsensi::find($kodeabsensi->id);
        return view('kodeabsen.formeditKA', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kodeabsensi  $kodeabsensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kodeabsensi $kodeabsensi)
    {
        $data = kodeabsensi::find($kodeabsensi->id);
        $data->update($request->all());
        return redirect()->route('kodeabsensi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kodeabsensi  $kodeabsensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(kodeabsensi $kodeabsensi)
    {
        $data = kodeabsensi::find($kodeabsensi->id);
        $data->delete();
        return redirect()->route('kodeabsensi.index');
    }
}
