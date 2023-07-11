<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LapPengeluaranController extends Controller
{
    public function GetPengeluaran()
    {

        // Pengeluaran
        $txrewards = DB::select('select nama_reward, SUM(amount_reward) as TotalHadiahDiberikan from rewardsanaks;');
        $txbantuan = DB::select('select nama_bantuan, SUM(amount_bantuan) as TotalBantuanDiberikan from bantuananaks;');

        $sumrewards = "";
        $sumbantuan = "";


        foreach ($txrewards as $totalrewards) {
            $sumrewards = $totalrewards->TotalHadiahDiberikan;
        }

        foreach ($txbantuan as $totalbantuan) {
            $sumbantuan = $totalbantuan->TotalBantuanDiberikan;
        }


        // Sponsorship
        $mapsd = DB::select("select kelompok_umur.ku_name, SUM(amount_hadiah) as TotalTransaksi from hadiahsponsors, anakppa, kelompok_umur WHERE hadiahsponsors.anak_id = anakppa.id AND anakppa.kelompok_umur_id = kelompok_umur.id AND kelompok_umur.ku_description LIKE 'Sekolah Dasar' GROUP BY kelompok_umur.ku_description;");
        $maptk = DB::select("select kelompok_umur.ku_name, SUM(amount_hadiah) as TotalTransaksi from hadiahsponsors, anakppa, kelompok_umur WHERE hadiahsponsors.anak_id = anakppa.id AND anakppa.kelompok_umur_id = kelompok_umur.id AND kelompok_umur.ku_description LIKE 'Taman Kanak-Kanak' GROUP BY kelompok_umur.ku_description;");
        $mapsmp = DB::select("select kelompok_umur.ku_name, SUM(amount_hadiah) as TotalTransaksi from hadiahsponsors, anakppa, kelompok_umur WHERE hadiahsponsors.anak_id = anakppa.id AND anakppa.kelompok_umur_id = kelompok_umur.id AND kelompok_umur.ku_description LIKE 'Sekolah Menengah Pertama' GROUP BY kelompok_umur.ku_description;");
        $mapsmk = DB::select("select kelompok_umur.ku_name, SUM(amount_hadiah) as TotalTransaksi from hadiahsponsors, anakppa, kelompok_umur WHERE hadiahsponsors.anak_id = anakppa.id AND anakppa.kelompok_umur_id = kelompok_umur.id AND kelompok_umur.ku_description LIKE 'SMA-K / Kuliah' GROUP BY kelompok_umur.ku_description;");

        $sumsd = "";
        $sumtk = "";
        $sumsmp = "";
        $sumsmk  = "";

        foreach ($mapsd as $totalsd) {
            $sumsd = $totalsd->TotalTransaksi;
        }

        foreach ($maptk as $totaltk) {
            $sumtk = $totaltk->TotalTransaksi;
        }

        foreach ($mapsmp as $totalsmp) {
            $sumsmp = $totalsmp->TotalTransaksi;
        }

        foreach ($mapsmk as $totalsmk) {
            $sumsmk = $totalsmk->TotalTransaksi;
        }

        $mapsponsor = DB::select("SELECT kelompok_umur.ku_name as NamaKU, SUM(hadiahsponsors.amount_hadiah) as TotalTransaksi FROM kelompok_umur, hadiahsponsors, anakppa WHERE kelompok_umur.id = anakppa.kelompok_umur_id AND hadiahsponsors.anak_id = anakppa.id GROUP BY ku_name;");
        $maplabelsponsor = [];
        $mapdatadistribusisponsor = [];

        foreach ($mapsponsor as $map_sponsor) {
            $maplabelsponsor[] = $map_sponsor->NamaKU;
            $mapdatadistribusisponsor[] = $map_sponsor->TotalTransaksi;
        }

        return view('laporan.laporanpengeluaran', compact('sumrewards', 'sumbantuan', 'maplabelsponsor', 'mapdatadistribusisponsor', 'sumsd', 'sumtk', 'sumsmp', 'sumsmk'));
    }
}
