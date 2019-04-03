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
        return response()->json(Device::where('user_id', '=', $user_id)->get());
    }

    /**
     * Display the specified resource.
     *
     * @param int id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $user_id = auth('api')->user()->getAuthIdentifier();
        $device = Device::find($id);
        if ($device->user_id == $user_id && $device->status == 'confirmation required') {
            return response()->json($device);
        } else {
            return response()->json("", 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->json("id");
        $update = $request->json("update");
        $user_id = auth('api')->user()->getAuthIdentifier();
        $device = Device::find($id);
        if ($device->user_id == $user_id && $device->status == 'confirmation required') {
            if ($update == "confirm") {
                $device->status = "confirmation given";
            } elseif ($update == "deny") {
                $device->status = "confirmation denied";
            } else {
                return response()->json("", 400);
            }
        } else {
            return response()->json("", 400);
        }

        return response()->json("");
    }
}
