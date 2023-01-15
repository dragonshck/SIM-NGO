<?php

namespace App\Http\Controllers;

use App\Models\kegiatanppa;
use App\Models\KelompokUmur;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KegiatanppaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = kegiatanppa::all();
        $data_ku = KelompokUmur::all();
        $tanggalbang = [];
        $bulanbang = [];
        $schedule = [];

        foreach ($collection as $key => $item) {
            $to = Carbon::createFromFormat('Y-m-d', $item->tgl_mulai);
            $tanggalbang[] = $to->format('d');
            $bulanbang[] = $to->format('M');

            $created = Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at);
            $schedule[] = $created->diffInDays();
        }

        $tanggal = $tanggalbang;
        $bulan = $bulanbang;
        $countday = $schedule;


        return view('kegiatan.listkegiatan', compact('collection', 'data_ku', 'tanggal', 'bulan', 'countday'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_ku = KelompokUmur::all();
        return view('kegiatan.tambahkegiatan', compact('data_ku'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = KegiatanPPA::create($request->all());
        if ($request->hasFile('gambar_event')) {
            $request->file('gambar_event')->move('posterevent/', $request->file('gambar_event')->getClientOriginalName());
            $data->gambar_event = $request->file('gambar_event')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('kegiatanppa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kegiatanppa  $kegiatanppa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collection = KegiatanPPA::find($id);
        $data_ku = $collection->kegiatan2ku;

        // dd($collection->tgl_mulai);

        $from = Carbon::createFromFormat('Y-m-d', $collection->tgl_mulai);
        $to = Carbon::createFromFormat('Y-m-d', $collection->tgl_selesai);
        $tanggalbang = $from->format('d');
        $bulanbang = $from->format('M');

        $datefrom = Carbon::createFromFormat('Y-m-d', $collection->tgl_mulai);
        $dateto = Carbon::createFromFormat('Y-m-d', $collection->tgl_selesai);

        $startdate = $datefrom->toFormattedDateString();
        $enddate = $dateto->toFormattedDateString();

        $jamfrom = Carbon::createFromFormat('H:i:s', $collection->jam_mulai);
        $jamto = Carbon::createFromFormat('H:i:s', $collection->jam_selesai);

        $starthour = $jamfrom->format('H:i');
        $endhour = $jamto->format('H:i');

        return view('kegiatan.detailkegiatan', compact('collection', 'data_ku', 'tanggalbang', 'bulanbang', 'startdate', 'enddate', 'starthour', 'endhour'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kegiatanppa  $kegiatanppa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collection = KegiatanPPA::find($id);
        $data_ku = $collection->kegiatan2ku::where('id', $id);

        return view('kegiatan.detailkegiatan', compact('collection', 'data_ku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kegiatanppa  $kegiatanppa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = KegiatanPPA::find($id);
        if ($request->hasFile('gambar_event')) {
            $request->file('gambar_event')->move('posterevent/', $request->file('gambar_event')->getClientOriginalName());
            $data->fotoprofil = $request->file('gambar_event')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('daftar-kegiatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kegiatanppa  $kegiatanppa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KegiatanPPA::find($id);
        return redirect()->route('daftar-kegiatan');
    }
}
