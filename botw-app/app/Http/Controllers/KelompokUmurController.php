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
        $ku = KelompokUmur::findOrFail($id);
        $staff_tutor = StaffPPA::with('jabatan')->where('jabatan_staff_id', 2)->where('kelompok_umur_id', 0)->get();
        $staff_assigne = StaffPPA::with('user')->where('kelompok_umur_id', $id)->first();
        return view('datakelumur.editdatakode', compact('ku', 'staff_tutor', 'staff_assigne', 'id'));
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
        // $request->validate([
        //     'ku_name'        => 'required|string|max:255',
        //     'ku_description'     => 'required|numeric',
        // ]);

        // $staff = StaffPPA::where('id', $request->tutor_anak_id)->with('user')->first();
        // $class = KelompokUmur::find($id);

        // $class->update([
        //     'ku_name'        => $request->ku_name,
        //     'ku_description'     => $request->ku_description,
        // ]);

        // if($class){
        //     $staff->update([
        //         'kelompok_umur_id' => $class->id
        //     ]);
        // }
        // dd($request->kelompok_umur_id);

        // $request->validate([
        //     'ku_name'        => 'required|string|max:255',
        //     'ku_description' => 'required|numeric',
        // ]);

        $deleting_last_staff = StaffPPA::where('kelompok_umur_id', $id)->first();
        $deleting_last_staff->update([
            'kelompok_umur_id' => 0
        ]);

        $request->all();

        $validatedData = KelompokUmur::find($id);

        $validatedData->update([
            'ku_name'        => $request->ku_name,
            'ku_description' => $request->ku_description,
        ]);

        // dd($validatedData->id);
        

        $staff = StaffPPA::where('kelompok_umur_id', $id)->first();
        if($validatedData){
            $staff->update([
                'kelompok_umur_id' => $validatedData->id
            ]);
        }
        // $class = KelompokUmur::find($id);
        // if($class){
        //     $class->update($validatedData);
        // }

        // $staff = StaffPPA::where('id', $request->tutor_anak_id)->with('user')->first();
        // if($staff){
        //     $staff->update([
        //         'kelompok_umur_id' => $class->id
        //     ]);
        // }
        if($validatedData && $staff){
            return redirect()->route('kelompokumur.index')->with('success','Kelompok Umur Updated Successfully');
        }else{
            return redirect()->route('kelompokumur.index')->with('error','Something went wrong, please try again');
        }
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
