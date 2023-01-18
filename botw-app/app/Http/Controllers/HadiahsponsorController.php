<?php

namespace App\Http\Controllers;

use App\Models\AnakPPA;
use App\Models\hadiahsponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HadiahsponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = hadiahsponsor::with('hadiahanak')->get();
        return view('sponsor.penerimaan.listtrx', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_anak = AnakPPA::with('user')->get();
        return view('sponsor.penerimaan.createtrx', compact('data_anak'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_hadiah'       => 'required|string|max:255|unique:hadiahsponsors',
            'keterangan_hadiah' => 'required|string|max:255',
            'anak_id'           => 'required|numeric',
            'amount_hadiah'     => 'required|string|max:255'
        ]);

        $hadiah = hadiahsponsor::create([
            'nama_hadiah'           => $request->nama_hadiah,
            'keterangan_hadiah'     => $request->keterangan_hadiah,
            'anak_id'               => $request->anak_id,
            'amount_hadiah'         => $request->amount_hadiah
        ]);

        if ($request->hasFile('lampiran_hadiah')) {
            $profile = Str::slug($hadiah->nama_hadiah) . '-' . $hadiah->id . '.' . $request->lampiran_hadiah->getClientOriginalExtension();
            $request->lampiran_hadiah->move(public_path('images/transaction'), $profile);
        } else {
            $profile = 'avatar.png';
        }
        $hadiah->update([
            'lampiran_hadiah' => $profile
        ]);

        return redirect()->route('hadiahsponsor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hadiahsponsor  $hadiahsponsor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_sponsor = hadiahsponsor::with('hadiahanak')->find($id);
        // dd($data_sponsor->hadiahanak->sponsor->toArray());
        return view('sponsor.penerimaan.detailstrx', compact('data_sponsor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hadiahsponsor  $hadiahsponsor
     * @return \Illuminate\Http\Response
     */
    public function edit(hadiahsponsor $hadiahsponsor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hadiahsponsor  $hadiahsponsor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hadiahsponsor $hadiahsponsor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hadiahsponsor  $hadiahsponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy(hadiahsponsor $hadiahsponsor)
    {
        //
    }

    public function status_update($id)
    {

        $data = hadiahsponsor::where('id', $id)->first();

        $status_skrg = $data->status_hadiah;

        if ($status_skrg == 1) {
            DB::table('hadiahsponsors')->where('id', $id)->update([
                'status_hadiah' => 0
            ]);
        } else {
            DB::table('hadiahsponsors')->where('id', $id)->update([
                'status_hadiah' => 1
            ]);
        }

        return redirect()->route('bantuan.index');
    }
}
