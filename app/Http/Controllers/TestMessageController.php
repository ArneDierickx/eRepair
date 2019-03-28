<?php

namespace App\Http\Controllers;

use App\TestMessage;
use Illuminate\Http\Request;

class TestMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODO return request()->user->username;
        // Auth('api')::user->user
        return response()->json(["messages" => TestMessage::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\TestMessage  $testMessage
     * @return \Illuminate\Http\Response
     */
    public function show(TestMessage $testMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TestMessage  $testMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(TestMessage $testMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TestMessage  $testMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestMessage $testMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TestMessage  $testMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestMessage $testMessage)
    {
        //
    }
}
