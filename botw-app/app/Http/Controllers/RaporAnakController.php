<?php

namespace App\Http\Controllers;

use App\Models\AnakPPA;
use App\Models\RaporAnak;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class RaporAnakController extends Controller
{
    use HasRoles;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usr = auth()->user()->hasRole('tutor');
        if ($usr) {
            $kelompok_umur = auth()->user()->staff->kelompokumur;
            $anak = AnakPPA::where('kelompok_umur_id', $kelompok_umur->id)->pluck('id')->toArray();
            // dd($anak);
            // dd($kelompok_umur);
            $datarapor = RaporAnak::with('anak2rapor')->where('anak_id', $anak)->get();

            $now = Carbon::now();
            return view('anak.raporanak.raporanak', compact('datarapor', 'now'));
        } elseif (auth()->user()->hasRole('mentor')) {
            $now = Carbon::now();
            // dd($id);
            $datarapor = RaporAnak::with('anak2rapor')->get();
            return view('anak.raporanak.raporanak', compact('datarapor', 'now'));
        } else {
            $id = auth()->user()->anak->id;
            $now = Carbon::now();
            // dd($id);
            $datarapor = RaporAnak::with('anak2rapor')->where('anak_id', $id)->get();
            return view('anak.raporanak.raporanak', compact('datarapor', 'now'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'anak_id' => \Auth::user()->anak->id,
            'keterangan_rapor' => $request->keterangan_rapor,
            'avg_nilai' => $request->avg_nilai,
            'created_at' => now('6.0') . date('')
        ];

        if ($request->file('lampiran_rapor')) {
            $file = $request->file('lampiran_rapor');
            $input['lampiran_rapor'] = time() . '_post_lampiran_rapor.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('raporanak/');
            $file->move($destinationPath, $input['lampiran_rapor']);
            $data['lampiran_rapor'] = $input['lampiran_rapor'];
        }

        DB::table('rapor_anaks')->insert($data);

        return redirect()->route('rapor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RaporAnak  $raporAnak
     * @return \Illuminate\Http\Response
     */
    public function show(RaporAnak $raporAnak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RaporAnak  $raporAnak
     * @return \Illuminate\Http\Response
     */
    public function edit(RaporAnak $raporAnak)
    {
        // $datarapor = RaporAnak::with('anak2rapor')->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RaporAnak  $raporAnak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RaporAnak $raporAnak)
    {
        $data = [
            'anak_id' => \Auth::user()->anak->id,
            'keterangan_rapor' => $request->keterangan_rapor,
            'avg_nilai' => $request->avg_nilai,
            'created_at' => now('6.0') . date('')
        ];

        // $file = $request->file('lampiran_rapor');
        // dd($file);

        if ($request->file('lampiran_rapor') && $request->file('lampiran_rapor')->isValid()) {
            $file = $request->file('lampiran_rapor');
            $input['lampiran_rapor'] = time() . '_post_lampiran_rapor.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('raporanak/');
            $file->move($destinationPath, $input['lampiran_rapor']);
            $data['lampiran_rapor'] = $input['lampiran_rapor'];
        }

        DB::table('rapor_anaks')->update($data);

        return redirect()->route('rapor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RaporAnak  $raporAnak
     * @return \Illuminate\Http\Response
     */
    public function destroy(RaporAnak $raporAnak)
    {
        //
    }
}
