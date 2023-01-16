<?php

namespace App\Http\Controllers;

use App\Models\AbsensiAnak;
use App\Models\AnakPPA;
use App\Models\KelompokUmur;
use App\Models\kodeabsensi;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = AbsensiAnak::groupBy('periode')->orderBy('periode', 'desc')->get();
        $absen = DB::select('select tanggal_absen, count(tanggal_absen) from `absensi_anak` group by `periode` order by `periode` asc;');
        $data = AbsensiAnak::groupBy('periode')->orderBy('tanggal_absen', 'desc')->get();
        return view('anak.absensi.absensianak', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ex = auth()->user()->staff;
        
        $data_ku = KelompokUmur::where('tutor_anak_id', $ex->jabatan_staff_id)->get();
        // dd($ex->jabatan_staff_id);
        // $kabsen = [];
        // foreach($kabsen as $item) {
        //     $kabsen[] = [
        //         "id" => $kabsen->id,
        //         "kode_absen" => $kabsen->kode_absen,
        //         "nama_absen" => $kabsen->nama_absen,
        //         "keterangan" => $kabsen->keterangan
        //     ];
        // }
        // dd($kabsen[]->kode_absen->toArray());
        $kabsen = kodeabsensi::with('buatabsen')->get();
        // foreach ($kabsen as $item) {
        //     $item;
        // }
        return view('anak.absensi._inputabsen', compact('data_ku', 'kabsen'));
    }

    public function getAnakbyKelompokUmur($id)
    {
        $data_anak = AnakPPA::with('user')->where('kelompok_umur_id', $id)->get();
        return json_encode(['success' => true, 'data' => $data_anak]);
        // echo json_encode($data_anak);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $list_absensi = $request->absensi;
        $absensi = $request->tanggal_absen;
        $period = $request->periode;
        foreach ($list_absensi as $index => $item) {

            AbsensiAnak::create([
                'status_absen' => $item,
                'anak_p_p_a_id' => $index,
                'tanggal_absen' => $absensi,
                'periode' => $period
            ]);
        }

        return redirect()->route('absenanak.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AbsensiAnak  $absensiAnak
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request, $id)
    {
        $kelompok_umur = auth()->user()->tutor->kelompokumur;

        $anak = AnakPPA::where('kelompok_umur_id', $kelompok_umur->id)->pluck('id')->toArray();
        $data = AbsensiAnak::where('periode', $id)
            ->groupBy('anak_p_p_a_id')
            ->with('_anak')
            ->whereIn('anak_p_p_a_id', $anak)
            ->get();

        $x = Carbon::now()->daysInMonth;
        $y = date_parse($id);
        $z = date('Y');
        $begin_date = $z . '-' . $y['month'] . '-01';
        $end_date = $z . '-' . $y['month'] . '-' . $x;

        $period = CarbonPeriod::create($begin_date, $end_date);

        foreach ($period as $index => $item) {

            $all_periode[] = $item->format('Y-m-d');
        }

        $tahun = $id;
        return view('anak.absensi._detailabsen', compact('data', 'all_periode', 'tahun'));
    }

    public static function getAnakByDate($id, $year, $date)
    {
        $x = Carbon::now()->daysInMonth;
        $y = date_parse($date);
        // dd($year);
        $begin_date = $year . '-' . $y['month'] . '-01';
        $end_date = $year . '-' . $y['month'] . '-' . $x;

        // dd($begin_date, $end_date);
        $period = CarbonPeriod::create($begin_date, $end_date);

        // dd($begin_date, $end_date);
        foreach ($period as $index => $item) {
            
            $tanggal_absen = $item->format('Y-m-d');
            $data = AbsensiAnak::where('anak_p_p_a_id', $id)->where('tanggal_absen', $tanggal_absen)->first();

            $all_data[] = [
                'status_absen' => $data->status_absen ?? null
            ];
        }

        return $all_data;
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
