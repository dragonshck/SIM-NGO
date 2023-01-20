<?php

namespace App\Http\Controllers;

use App\Models\lessonplan;
use App\Models\revisilp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class LessonplanController extends Controller
{
    use HasRoles;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('tutor')) {
            $tutorid = \Auth::user()->staff->id;
            $lp = lessonplan::with('lptutor')->where('tutor_id', $tutorid)->get();
            foreach ($lp as $rev) {
                $revlp = revisilp::with('revisi')->where('lp_id', $rev->id)->get();
            }
            // $lp = lessonplan::with('lptutor')->get();
            return view('lessonplan.lessonplan', compact('lp', 'revlp'));
        } else {
            $lp = lessonplan::with('lptutor')->get();
            $revlp = revisilp::with('revisi')->get();
            // $lp = lessonplan::with('lptutor')->get();
            return view('lessonplan.lessonplan', compact('lp', 'revlp'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lessonplan.tambahlp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->toArray());
        $data = [
            'tutor_id' => Auth::user()->staff->id,
            'isi_lp' => $request->isi_lp,
            'judul_lp' => $request->judul_lp,
            'created_at' => now('6.0') . date(''),
        ];

        if ($request->file('lampiran_lp')) {
            $file = $request->file('lampiran_lp');
            $input['lampiran_lp'] = time() . '_post_lampiran_lp.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('lptutor/');
            $file->move($destinationPath, $input['lampiran_lp']);
            $data['lampiran_lp'] = $input['lampiran_lp'];
        }

        DB::table('lessonplans')->insert($data);

        return redirect()->route('lessonplan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lessonplan  $lessonplan
     * @return \Illuminate\Http\Response
     */
    public function show(lessonplan $lessonplan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lessonplan  $lessonplan
     * @return \Illuminate\Http\Response
     */
    public function edit(lessonplan $lessonplan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lessonplan  $lessonplan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lessonplan $lessonplan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lessonplan  $lessonplan
     * @return \Illuminate\Http\Response
     */
    public function destroy(lessonplan $lessonplan)
    {
        //
    }

    public function status_update($id)
    {

        $data = lessonplan::where('id', $id)->first();
        $status_skrg = $data->status_lp;

        if ($status_skrg == 1) {
            DB::table('lessonplans')->where('id', $id)->update([
                'status_lp' => 0
            ]);
        } else {
            DB::table('lessonplans')->where('id', $id)->update([
                'status_lp' => 1
            ]);
        }

        return redirect()->route('lessonplan.index');
    }
}
