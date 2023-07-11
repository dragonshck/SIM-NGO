<?php

namespace App\Http\Controllers;

use App\Models\cutistaff;
use App\Models\StaffPPA;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use App\Mail\CutiNotify;
use App\Models\User;
use Error;
use Exception;
use Illuminate\Support\Facades\Mail;

class CutistaffController extends Controller
{
    use HasRoles;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usr = auth()->user()->hasRole('koordinator');
        if ($usr) {
            $collection = cutistaff::with('cuti2staff')->get();
            $daysdiff = [];

            foreach ($collection as $index => $item) {
                $to = Carbon::createFromFormat('Y-m-d', $item->tgl_mulai);
                $from = Carbon::createFromFormat('Y-m-d', $item->tgl_selesai);

                $daysdiff[] = $to->diffInDays($from);
            }

            $hari_cuti = $daysdiff;

            return view('staff.cuti.datacuti', compact('collection', 'hari_cuti'));
        } else {
            $id = \Auth::user()->staff->id;

            $collection = cutistaff::with('cuti2staff')->where('staff_id', $id)->get();
            $daysdiff = [];

            foreach ($collection as $index => $item) {
                $to = Carbon::createFromFormat('Y-m-d', $item->tgl_mulai);
                $from = Carbon::createFromFormat('Y-m-d', $item->tgl_selesai);

                $daysdiff[] = $to->diffInDays($from);
            }

            $hari_cuti = $daysdiff;

            return view('staff.cuti.datacuti', compact('collection', 'hari_cuti', 'id'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_staff = StaffPPA::all();
        return view('staff.cuti._tambahcuti', compact('data_staff'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $data = CutiStaff::create($request->all());
        if ($request->hasFile('gambar_bukti')) {
            foreach ($request->file('gambar_bukti') as $image) {
                $imageName = $data['keterangan'] . '-image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $request->file('gambar_bukti')->move('bukticuti_images/', $request->file('gambar_bukti')->$imageName);
                $data->gambar_bukti = $request->file('gambar_bukti')->$imageName;
                $data->save();
            }
        }
        if ($request->hasFile('gambar_bukti')) {
            $request->file('gambar_bukti')->move('bukticuti_staff/', $request->file('gambar_bukti')->getClientOriginalName());
            $data->gambar_bukti = $request->file('gambar_bukti')->getClientOriginalName();
            $data->save();
        }

        try {
            Mail::to('specterknight96@gmail.com')->send(new CutiNotify($data));
            return redirect()->route('cutiizin.index');
        } catch (Error $err) {
            return response()->json('Something went wrong!');
        }

        return redirect()->route('cutiizin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cutistaff  $cutistaff
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collection = cutistaff::find($id);
        $data_staff = $collection->cuti2staff;
        return view('staff.cuti._detailcuti', compact('collection', 'data_staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cutistaff  $cutistaff
     * @return \Illuminate\Http\Response
     */
    public function edit(cutistaff $cutistaff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cutistaff  $cutistaff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cutistaff $cutistaff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cutistaff  $cutistaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(cutistaff $cutistaff)
    {
        //
    }

    public function status_update($id)
    {

        $data = cutistaff::where('id', $id)->first();
        // if ($request->status == 'completed') {
        //     $req['status'] = 1;
        // } else {
        //     $req['status'] = 0;
        // }

        // $update = $data->update($req);
        // if ($update) {
        //     return response()->json(true);
        // } else {
        //     return response()->json(false);
        // }

        $status_skrg = $data->status;

        if ($status_skrg == 1) {
            DB::table('cutistaffs')->where('id', $id)->update([
                'status' => 0
            ]);
        } else {
            DB::table('cutistaffs')->where('id', $id)->update([
                'status' => 1
            ]);
        }

        return redirect()->route('cutiizin.index');
    }

    function WarningLimitCuti($id)
    {
        $warnUser = cutistaff::where('staff_id', $id)->whereMonth('created_at', Carbon::now()->month)->count();
        return json_encode(['success' => true, 'data' => $warnUser]);
    }
}
