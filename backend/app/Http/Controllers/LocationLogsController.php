<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\locationLogs;
use App\Http\Resources\LocationLogsResource;

class LocationLogsController extends Controller
{
    public function index()
    {
    }
    public function show($id)
    {
    }
    public function store(Request $request)
    {
        $cred = $request->validate([
            'transaction_id' => ['required', 'Integer'],
            'location_address' => ['required', 'String']
        ]);
        $location = new locationLogs;
        $location->transaction_id = $request->transaction_id;
        $location->location_address = $request->location_address;
        if ($location->save()) {
            return response()->json(['success' => true, 'message' => "successfully store LocationLogs"]);
        }
        return response()->json(['success' => false, 'message' => "failed to store LocationLogs"]);
    }
}
