<?php

namespace App\Http\Controllers;

use App\Models\JabatanStaff;
use Illuminate\Http\Request;

class JabatanStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataku = JabatanStaff::all();
        return view('staff.jabatan.listjabatan', compact('dataku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.jabatan._createjabatan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        JabatanStaff::create($request->all());
        return redirect()->route('jabatanstaff.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JabatanStaff  $jabatanStaff
     * @return \Illuminate\Http\Response
     */
    public function show(JabatanStaff $jabatanStaff)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JabatanStaff  $jabatanStaff
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = JabatanStaff::find($id);
        return view('staff.jabatan._editjabatan', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JabatanStaff  $jabatanStaff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = JabatanStaff::find($id);
        $data->update($request->all());
        return redirect()->route('jabatanstaff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JabatanStaff  $jabatanStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = JabatanStaff::find($id);
        $data->delete();
        return redirect()->route('jabatanstaff.index');
    }
}
