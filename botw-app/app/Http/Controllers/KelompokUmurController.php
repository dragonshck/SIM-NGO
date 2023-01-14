<?php

namespace App\Http\Controllers;

use App\Models\KelompokUmur;
use App\Models\TutorAnak;
use Illuminate\Http\Request;

class KelompokUmurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataku = KelompokUmur::withCount('anakku')->get();
        return view('datakelumur.kelompokumur', compact('dataku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tutor = TutorAnak::latest()->get();
        return view('datakelumur.tambahdatakode', compact('tutor'));
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
            'ku_name'        => 'required|string|max:255',
            'ku_description'     => 'required|numeric',
            'tutor_anak_id'        => 'required|numeric',
        ]);

        KelompokUmur::create([
            'ku_name'        => $request->ku_name,
            'ku_description'     => $request->ku_description,
            'tutor_anak_id'        => $request->tutor_anak_id,
        ]);

        return redirect()->route('kelompokumur.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KelompokUmur  $kelompokUmur
     * @return \Illuminate\Http\Response
     */
    public function show(KelompokUmur $kelompokUmur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KelompokUmur  $kelompokUmur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tutor = TutorAnak::latest()->get();
        $ku = KelompokUmur::findOrFail($id);
        return view('datakelumur.editdatakode', compact('tutor', 'ku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KelompokUmur  $kelompokUmur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ku_name'        => 'required|string|max:255',
            'ku_description'     => 'required|numeric',
            'tutor_anak_id'        => 'required|numeric',
        ]);

        $class = KelompokUmur::findOrFail($id);

        $class->update([
            'ku_name'        => $request->ku_name,
            'ku_description'     => $request->ku_description,
            'tutor_anak_id'        => $request->tutor_anak_id,
        ]);

        return redirect()->route('kelompokumur.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KelompokUmur  $kelompokUmur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = KelompokUmur::findOrFail($id);

        $class->tutor()->detach();
        $class->delete();

        return back();
    }
}
