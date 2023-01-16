<?php

namespace App\Http\Controllers;

use App\Models\lessonplan;
use Illuminate\Http\Request;

class LessonplanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lessonplan.lessonplan');
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
        //
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
