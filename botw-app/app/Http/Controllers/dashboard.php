<?php

namespace App\Http\Controllers;

use App\Models\AbsensiAnak;
use App\Models\AnakPPA;
use App\Models\KelompokUmur;
use App\Models\SponsorAnak;
use App\Models\StaffPPA;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\DB;

class dashboard extends Controller
{
    use HasRoles;
    public function index()
    {
        $data_anak  = AnakPPA::get()->count();
        $data_staff = StaffPPA::get()->count();
        $data_sp = SponsorAnak::get()->count();

        $data_ku = KelompokUmur::all();

        // Chart Sebaran Kelompok Umur
        $sebaran_ku = DB::select('select kelompok_umur.ku_name, COUNT(anakppa.id) as TotalAnak FROM anakppa LEFT join kelompok_umur on anakppa.kelompok_umur_id = kelompok_umur.id GROUP BY ku_name;');
        $labelsku = [];
        $datachart = [];
        foreach ($sebaran_ku as $count_ku) {
            $labelsku[] = $count_ku->ku_name;
            //$labelsku .= "['" . $count_ku->nama_ku . "'],";
            //$datachart .= "[" . $count_ku->TotalAnak . "]";
            $datachart[] = $count_ku->TotalAnak;
        }
        // Chart Absensi Anak

        //Format Date
        $x = Carbon::now()->daysInMonth;
        $z = date('Y');
        $all_month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', "August", 'September', 'October', 'November', 'December'];

        foreach ($all_month as $indx => $item) {
            $month_to_number = Carbon::parse($item)->month;

            $start = Carbon::now()->month($month_to_number)->startOfMonth()->format('Y-m-d');

            $end = Carbon::now()->month($month_to_number)->endOfMonth()->format('Y-m-d');
            // \DB::enableQueryLog();
            $xx = AbsensiAnak::select('anak_p_p_a_id', 'periode', DB::raw('count(status_absen) as JumlahAbsen'))->whereBetween('tanggal_absen', [
                $start,
                $end
            ])
                ->groupBy('periode')
                ->havingRaw('COUNT(status_absen = 1)')
                ->orderBy('periode', 'desc')
                ->get()->toArray();

            if (!empty($xx)) {

                $data_check[] = $xx[0]['JumlahAbsen'];
            } else {
                $data_check[] = 0;
            }

            // dd(\DB::getQueryLog());;
        }
        $total_data = $data_check;

        $jumlahabsen = [];


        return view('dashboard', compact('data_anak', 'data_staff', 'labelsku', 'datachart', 'all_month', 'jumlahabsen', 'total_data', 'data_anak', 'data_staff', 'data_sp'));
    }

    public function fetch_dashboard($id)
    {

        $z = date('Y');
        $year_subs = $z - $id;
        $same = false;
        if ($year_subs == 0) {
            $same = true;
        }
        $all_month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', "August", 'September', 'October', 'November', 'December'];

        foreach ($all_month as $indx => $item) {
            $month_to_number = Carbon::parse($item)->month;
            if ($same) {

                $start = Carbon::now()->month($month_to_number)->startOfMonth()->format('Y-m-d');

                $end = Carbon::now()->month($month_to_number)->endOfMonth()->format('Y-m-d');
            } else {
                $start = Carbon::now()->month($month_to_number)->subYear($year_subs)->startOfMonth()->format('Y-m-d');

                $end = Carbon::now()->month($month_to_number)->subYear($year_subs)->endOfMonth()->format('Y-m-d');
            }

            // \DB::enableQueryLog();
            $xx = AbsensiAnak::select('anak_p_p_a_id', 'periode', DB::raw('count(status_absen) as JumlahAbsen'))->whereBetween('tanggal_absen', [
                $start,
                $end
            ])
                ->groupBy('periode')
                ->havingRaw('COUNT(status_absen = 1)')
                ->orderBy('periode', 'desc')
                ->get()->toArray();

            if (!empty($xx)) {

                $data_check[] = $xx[0]['JumlahAbsen'];
            } else {
                $data_check[] = 0;
            }
            // dd(\DB::getQueryLog());;
        }
        $data = [
            'label' => $all_month,
            'jumlah' => $data_check
        ];
        return $data;
    }
}
