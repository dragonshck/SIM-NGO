<?php

namespace App\Http\Controllers;

use App\Models\bantuananak;
use App\Models\KelompokUmur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BantuananakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = bantuananak::all();
        $collection_ank = KelompokUmur::all();
        return view('bantuan.listbantuan', compact('collection', 'collection_ank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collection_ank = KelompokUmur::all();
        return view('bantuan._add', compact('collection_ank'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataz = $request->all();
        $data = BantuanAnak::create($dataz);
        if ($request->hasFile('lampiran_bantuan')) {
            $profile = Str::slug($data->lampiran_bantuan) . '-' . $data->id . '.' . $request->lampiran_bantuan->getClientOriginalExtension();
            $request->lampiran_bantuan->move(public_path('images/transaction'), $profile);
        } else {
            $profile = 'avatar.png';
        }
        $data->update([
            'lampiran_bantuan' => $profile
        ]);

        return redirect()->route('bantuan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bantuananak  $bantuananak
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collection = BantuanAnak::find($id);

        return view('bantuan._detail', compact('collection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bantuananak  $bantuananak
     * @return \Illuminate\Http\Response
     */
    public function edit(bantuananak $bantuananak)
    {
        return view('bantuan._update');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bantuananak  $bantuananak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bantuananak $bantuananak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bantuananak  $bantuananak
     * @return \Illuminate\Http\Response
     */
    public function destroy(bantuananak $bantuananak)
    {
        //
    }

    public function status_update($id)
    {

        $data = bantuananak::where('id', $id)->first();

        $status_skrg = $data->status_trxbantuan;

        if ($status_skrg == 1) {
            DB::table('bantuananaks')->where('id', $id)->update([
                'status_trxbantuan' => 0
            ]);
        } else {
            DB::table('bantuananaks')->where('id', $id)->update([
                'status_trxbantuan' => 1
            ]);
        }

        return redirect()->route('bantuan.index');
    }
}
