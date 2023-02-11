<?php

namespace App\Http\Controllers;

use App\Models\kegiatanppa;
use App\Models\KelompokUmur;
use App\Models\StaffPPA;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\GoogleCalendar\Event;

class KegiatanppaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        // $kegiatanz = kegiatanppa::all();
        $events = Event::get();
        $tanggalbang = [];
        $bulanbang = [];
        $tanggalmulai = [];
        $tanggalselesai = [];
        $jammulai = [];

        foreach ($events as $key => $item) {
            $to = Carbon::createFromFormat('c', $item->start->dateTime);
            $tanggalbang[] = $to->format('d');
            $bulanbang[] = $to->format('M');
            $tanggalmulai[] = $to->toFormattedDateString();
            $jammulai[] = $to->toTimeString();

            $xx = Carbon::createFromFormat('c', $item->end->dateTime);
            $tanggalselesai[] = $xx->toFormattedDateString();

        }

        $tanggal = $tanggalbang;
        $bulan = $bulanbang;
        $startdate = $tanggalmulai;
        $enddate = $tanggalselesai;
        $starthour = $jammulai;

        // $tanggalbang = [];
        // $bulanbang = [];
        // $tanggalmulai = [];
        // $tanggalselesai = [];
        // $jammulai = [];


        // foreach ($kegiatanz as $key => $item) {
            
        //     $to = $item->tgl_mulai;
        //     $tanggalbang[] = $to->format('d');
        //     $bulanbang[] = $to->format('M');
        //     $tanggalmulai[] = $to->toFormattedDateString();

        //     $xkito = $item->jam_mulai;
        //     $jammulai[] = $xkito;

        //     $created = $item->tgl_selesai;
        //     $tanggalselesai[] = $created->toFormattedDateString();
        // }

        // $tanggal = $tanggalbang;
        // $bulan = $bulanbang;
        // $startdate = $tanggalmulai;
        // $enddate = $tanggalselesai;
        // $starthour = $jammulai;

        return view('kegiatan.listkegiatan', compact('tanggal', 'bulan', 'startdate', 'enddate', 'starthour', 'events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = StaffPPA::with('user')->get();
        return view('kegiatan.tambahkegiatan', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->input('tgl_mulai'));
        $a = Carbon::createFromFormat('d-m-Y', $request->tgl_mulai);
        $b = Carbon::createFromFormat('H:i', $request->jam_mulai);

        $c = Carbon::createFromFormat('d-m-Y', $request->tgl_selesai);
        $d = Carbon::createFromFormat('H:i', $request->jam_selesai);

        $dateValue = explode(' ', $a)[0];
        $dateValue1 = explode(' ', $b)[1];

        $dares = explode(' ', $c)[0];
        $eternity = explode(' ', $d)[1];

        $x = Carbon::parse($dateValue.' ' . $dateValue1);
        $y = Carbon::parse($dares.' ' . $eternity);

        $newEvent = Event::create([
            'name' => $request->judul_kegiatan,
            'startDateTime' => $x,
            'endDateTime' => $y,
            'location' => $request->tempat_pelaksanaan,
            'description' => $request->keterangan_event,
        ]);

        $getEventId = $newEvent->id;

        $data = [
            'judul_kegiatan' => $request->judul_kegiatan,
            'tempat_pelaksanaan' => $request->tempat_pelaksanaan,
            'keterangan_event' => $request->keterangan_event,
            'tgl_mulai' => Carbon::parse($request->tgl_mulai)->format('Y-m-d'),
            'tgl_selesai' => Carbon::parse($request->tgl_selesai)->format('Y-m-d'),
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'calendar_id' => $getEventId,
            'created_at' => now('6.0') . date(''),
        ];

        if ($request->file('gambar_event')) {
            $file = $request->file('gambar_event');
            $input['gambar_event'] = time() . '_post_gambar_event.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images/gambar_event');
            $file->move($destinationPath, $input['gambar_event']);
            $data['gambar_event'] = $input['gambar_event'];
        }

        DB::table('kegiatanppas')->insert($data);

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
        $getId = DB::table('kegiatanppas')->where('calendar_id', $id)->first();
        $event = Event::find($id);
        
        // dd($collection->tgl_mulai);

        $from = Carbon::createFromFormat('c', $event->start->dateTime);
        $to = Carbon::createFromFormat('c', $event->end->dateTime);
        $tanggalbang = $from->format('d');
        $bulanbang = $from->format('M');

        $startdate = $from->toFormattedDateString();
        $enddate = $to->toFormattedDateString();

        $jamfrom = $from->toTimeString();
        $jamto = $to->toFormattedDateString();

        $starthour = $jamfrom;
        $endhour = $jamto;

        return view('kegiatan.detailkegiatan', compact('event', 'tanggalbang', 'bulanbang', 'startdate', 'enddate', 'starthour', 'endhour'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kegiatanppa  $kegiatanppa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getId = DB::table('kegiatanppas')->where('calendar_id', $id)->first();
        $event = Event::find($id);
        // $event = DB::table('kegiatanppas')->where('calendar_id', $getId)->first();
       
        return view('kegiatan.updatekegiatan', compact('event', 'getId', 'id'));
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
        $event = Event::find($id);
        $data = [
            'judul_kegiatan' => $request->judul_kegiatan,
            'tempat_pelaksanaan' => $request->tempat_pelaksanaan,
            'keterangan_event' => $request->keterangan_event,
            'tgl_mulai' => Carbon::parse($request->tgl_mulai)->format('Y-m-d'),
            'tgl_selesai' => Carbon::parse($request->tgl_selesai)->format('Y-m-d'),
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ];

        $kegiatandb = kegiatanppa::where('calendar_id', $id);
        $kegiatandb->update($data);
        
        $a = Carbon::createFromFormat('d-m-Y', $request->tgl_mulai);
        $b = Carbon::createFromFormat('H:i', $request->jam_mulai);

        $c = Carbon::createFromFormat('d-m-Y', $request->tgl_selesai);
        $d = Carbon::createFromFormat('H:i', $request->jam_selesai);

        $dateValue = explode(' ', $a)[0];
        $dateValue1 = explode(' ', $b)[1];

        $dares = explode(' ', $c)[0];
        $eternity = explode(' ', $d)[1];

        $x = Carbon::parse($dateValue.' ' . $dateValue1);
        $y = Carbon::parse($dares.' ' . $eternity);

        $event->update([
            'name' => $request->judul_kegiatan,
            'startDateTime' => $x,
            'endDateTime' => $y,
            'location' => $request->tempat_pelaksanaan,
            'description' => $request->keterangan_event,
        ]);

        return redirect()->route('kegiatanppa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kegiatanppa  $kegiatanppa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $kegiatandb = kegiatanppa::find($id)->where('calendar_id', $id);
        $kegiatandb->delete($kegiatandb);

        $event = Event::find($id);
        $event->delete();

        
        return redirect()->route('daftar-kegiatan');
    }
}
