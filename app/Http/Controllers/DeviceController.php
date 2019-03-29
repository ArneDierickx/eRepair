<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth('api')->user()->getAuthIdentifier();
        return response()->json(Device::all(['id', 'name', 'type', 'status', 'user_id'])->where('user_id', $user_id));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Device $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Device $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        //
    }
}
