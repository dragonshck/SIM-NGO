<?php

namespace App\Http\Controllers;

use App\Models\lessonplan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LessonplanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = \Auth::user()->id;
        $lp = lessonplan::with('lptutor')->where('tutor_id', $id)->get();
        dd($lp);
        // $lp = lessonplan::with('lptutor')->get();
        return view('lessonplan.lessonplan', compact('lp'));
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

        return redirect()->route('rapor-anak');
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
}
