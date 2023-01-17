<?php

namespace App\Http\Controllers;

use App\Models\logbookmengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogbookmengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = \Auth::user()->id;
        $logbook = logbookmengajar::with('logbooktutor')->where('staff_id', $id)->get();
        // dd($logbook);
        // $logbook = logbookmengajar::with('logbooktutor')->get();
        return view('logbooktutor.logbookmengajar', compact('logbook'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('logbooktutor.tambahlogbook');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $logbook = [
            'staff_id' => auth()->user()->staff->user->id,
            'judul_logbook' => $request->judul_logbook,
            'isi_logbook' => $request->isi_logbook,
            'created_at' => now('6.0') . date(''),
        ];

        if ($request->file('lampiran_kegiatan')) {
            $file = $request->file('lampiran_kegiatan');
            $input['lampiran_kegiatan'] = time() . '_post_lampiran_kegiatan.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images/lampiran_logbook');
            $file->move($destinationPath, $input['lampiran_kegiatan']);
            $logbook['lampiran_kegiatan'] = $input['lampiran_kegiatan'];
        }
        
        DB::table('logbookmengajars')->insert($logbook);

        return redirect()->route('logbook.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\logbookmengajar  $logbookmengajar
     * @return \Illuminate\Http\Response
     */
    public function show(logbookmengajar $logbookmengajar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\logbookmengajar  $logbookmengajar
     * @return \Illuminate\Http\Response
     */
    public function edit(logbookmengajar $logbookmengajar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\logbookmengajar  $logbookmengajar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, logbookmengajar $logbookmengajar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\logbookmengajar  $logbookmengajar
     * @return \Illuminate\Http\Response
     */
    public function destroy(logbookmengajar $logbookmengajar)
    {
        //
    }
}
