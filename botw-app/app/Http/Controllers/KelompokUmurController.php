<?php

namespace App\Http\Controllers;

use App\Models\KelompokUmur;
use App\Models\StaffPPA;
use App\Models\TutorAnak;
use App\Models\User;
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
        $dataku = KelompokUmur::with('tutor')->withCount('anakku')->get();
        // dd($dataku->toArray());
        return view('datakelumur.kelompokumur', compact('dataku'));
    }

    public static function getTutor($id)
    {
        $tutor = StaffPPA::with('user')->where('kelompok_umur_id', $id)->first();
        return $tutor;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tutor = StaffPPA::with('jabatan')->where('jabatan_staff_id', 2)->get();
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

        $staff = StaffPPA::where('id', $request->tutor_anak_id)->with('user')->first();
        // $request->validate([
        //     'ku_name'        => 'required|string|max:255',
        //     'ku_description'     => 'required|string',
        //     'tutor_anak_id'        => 'required|numeric',
        // ]);
        $create = KelompokUmur::create($request->all());

        if($create){
            $staff->update([
                'kelompok_umur_id' => $create->id
            ]);
        }

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
        $staff_tutor = StaffPPA::with('jabatan')->where('jabatan_staff_id', 2)->whereNull('kelompok_umur_id')->get();
        $staff_assigne = StaffPPA::with('user')->where('kelompok_umur_id', $id)->first();
        return view('datakelumur.editdatakode', compact('tutor', 'ku', 'staff_tutor', 'staff_assigne', 'id'));
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
        ]);

        dd($id);
        $deleting_last_staff = StaffPPA::where('kelompok_umur_id', $id)->first();
        $deleting_last_staff->update([
            'kelompok_umur_id' => NULL
        ]);

        $staff = StaffPPA::where('id', $request->tutor_anak_id)->with('user')->first();

        $class = KelompokUmur::findOrFail($id);

        $class->update([
            'ku_name'        => $request->ku_name,
            'ku_description'     => $request->ku_description,
        ]);

        if($class){
            $staff->update([
                'kelompok_umur_id' => $class->id
            ]);
        }

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
