<?php

namespace App\Http\Controllers;

use App\Models\AnakPPA;
use App\Models\rewardsanak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RewardsanakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reward = rewardsanak::with('rewardsanak')->get();
        return view('rewards.listrecieve', compact('reward'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_anak = AnakPPA::with('user')->get();
        return view('rewards.addrecieve', compact('data_anak'));
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
            'nama_reward'           => 'required|string|max:255|unique:rewardsanaks',
            'keterangan_reward'     => 'required|string|max:255',
            'anak_id'               => 'required|numeric',
            'amount_reward'         => 'required|string|max:255',
            'tipe_reward'           => 'required|string',
        ]);

        $rewards = rewardsanak::create([
            'nama_reward'       => $request->nama_reward,
            'keterangan_reward' => $request->keterangan_reward,
            'anak_id'           => $request->anak_id,
            'amount_reward'     => $request->amount_reward,
            'tipe_reward'       => $request->tipe_reward
        ]);

        if ($request->hasFile('lampiran_reward')) {
            $profile = Str::slug($rewards->nama_reward) . '-' . $rewards->id . '.' . $request->lampiran_reward->getClientOriginalExtension();
            $request->lampiran_reward->move(public_path('images/transaction'), $profile);
        } else {
            $profile = 'avatar.png';
        }
        $rewards->update([
            'lampiran_reward' => $profile
        ]);

        return redirect()->route('rewards.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rewardsanak  $rewardsanak
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collection = rewardsanak::with('rewardsanak')->find($id);
        return view('rewards.detailrecieve', compact('collection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rewardsanak  $rewardsanak
     * @return \Illuminate\Http\Response
     */
    public function edit(rewardsanak $rewardsanak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rewardsanak  $rewardsanak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rewardsanak $rewardsanak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rewardsanak  $rewardsanak
     * @return \Illuminate\Http\Response
     */
    public function destroy(rewardsanak $rewardsanak)
    {
        //
    }

    public function status_update($id)
    {

        $data = rewardsanak::where('id', $id)->first();

        $status_skrg = $data->status_reward;

        if ($status_skrg == 1) {
            DB::table('rewardsanaks')->where('id', $id)->update([
                'status_reward' => 0
            ]);
        } else {
            DB::table('rewardsanaks')->where('id', $id)->update([
                'status_reward' => 1
            ]);
        }

        return redirect()->route('rewards.index');
    }
}
