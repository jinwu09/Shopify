<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransactionCollection;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionReceivedController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $received = Transaction::with('locationLogs')->where('user_id', '=', $user_id)->where('status', '=', 'received')->get();
        return new TransactionCollection($received);
    }
    public function update($id)
    {
        $user_id = Auth::id();

        $TransactionUpdate = new Transaction;
        $TransactionUpdate->status = 'Received';
        if (Transaction::where('id', $id)->first()->update(array('status' => 'received'))) {
            return response()->json(['success' => true, 'message' => 'Successfully update TransactionReceived data']);
        }
        return response()->json(['success' => false, 'message' => "failed to update TransactionReceived "])->setStatusCode(400);
    }
}
