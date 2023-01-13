<?php

namespace App\Http\Controllers;

use App\Models\AbsensiStaff;
use App\Models\StaffPPA;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tgl = AbsensiStaff::where('tanggal_absen')->get();
        // $bulan = Carbon::parse($tgl)->format('F');
        // $absen = AbsensiStaff::with('absen2staff')->groupBy($bulan)->get();

        $absen = DB::select('select tanggal_absen, count(tanggal_absen) from `absensi_staff` group by `tanggal_absen` order by `tanggal_absen` asc;');
        // ->groupBy(function ($val) {
        //     return Carbon::parse($val->tanggal_absen)->format('m');
        // });

        // dd($absen)->toArray();
        $data = AbsensiStaff::groupBy('periode')->orderBy('periode', 'desc')->get();

        return view('staff.absensi.absenstaff', compact('absen', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_staff = StaffPPA::all();
        return view('staff.absensi._formtambah', compact('data_staff'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $list_absensi = $request->absensi;
        $absensi = $request->tanggal_absen;
        // dd($absensi);
        $list_absensi = $request->absensi;
        foreach ($list_absensi as $index => $item) {

            AbsensiStaff::create([
                'status_absen' => $item,
                'staff_p_p_a_id' => $index,
                'tanggal_absen' => $absensi,
                'periode' => date('F')
            ]);
        }

        return redirect()->route('absensistaff.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AbsensiStaff  $absensiStaff
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = AbsensiStaff::where('periode', $id)
            ->groupBy('staff_p_p_a_id')
            ->with('_staff')
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

        return view('staff.absensi._detailabsen', compact('data', 'all_periode', 'tahun'));
    }

    public function getStaffByDate($id, $year, $date)
    {
        $x = Carbon::now()->daysInMonth;
        $y = date_parse($date);
        // $z = date('Y');
        // $begin_date = $z . '-' . $y['month'] . '-01';
        // $end_date = $z . '-' . $y['month'] . '-' . $x;

        $begin_date = $year . '-' . $y['month'] . '-01';
        $end_date = $year . '-' . $y['month'] . '-' . $x;

        $period = CarbonPeriod::create($begin_date, $end_date);

        foreach ($period as $index => $item) {
            $tanggal_absen = $item->format('Y-m-d');
            $data = AbsensiStaff::where('staff_p_p_a_id', $id)->where('tanggal_absen', $tanggal_absen)->first();

            $all_data[] = [
                'status_absen' => $data->status_absen ?? null
            ];
        }

        return $all_data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AbsensiStaff  $absensiStaff
     * @return \Illuminate\Http\Response
     */
    public function edit(AbsensiStaff $absensiStaff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AbsensiStaff  $absensiStaff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AbsensiStaff $absensiStaff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AbsensiStaff  $absensiStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(AbsensiStaff $absensiStaff)
    {
        //
    }
}
