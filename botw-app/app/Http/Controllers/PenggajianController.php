<?php

namespace App\Http\Controllers;

use App\Models\JabatanStaff;
use App\Models\Penggajian;
use App\Models\StaffPPA;
use Illuminate\Http\Request;

class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data_gaji = Penggajian::all();
        $data_gaji = Penggajian::with('staff')->get();
        // dd($data_gaji->toArray());
        return view('penggajian.paycheckstaff', compact('data_gaji'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_staff = StaffPPA::with('user')->get();
        return view('penggajian._inputgaji', compact('data_staff'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Penggajian::create($request->all());
        // $data_gaji = $request->all();
        // dd($data_gaji);
        return redirect()->route('penggajian.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penggajian  $penggajian
     * @return \Illuminate\Http\Response
     */
    public function show(Penggajian $penggajian)
    {
        $gaji = Penggajian::with('staff')->findOrFail($penggajian->id);
        $uang_lembur = $gaji->uang_overtime;
        $waktu_lembur = $gaji->jumlah_overtime;
        $total_lembur = $uang_lembur * $waktu_lembur;
        return view('penggajian._detailgaji', compact('gaji', 'total_lembur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penggajian  $penggajian
     * @return \Illuminate\Http\Response
     */
    public function edit(Penggajian $penggajian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penggajian  $penggajian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penggajian $penggajian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penggajian  $penggajian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penggajian $penggajian)
    {
        //
    }

    public function getGajiByStaff($id)
    {
        $data_staff = StaffPPA::where('id', $id)->first();
        $data_gaji = JabatanStaff::where('id', $data_staff->jabatan_staff_id)->first();
        return json_encode(['success' => true, 'data' => $data_gaji]);
    }
}
