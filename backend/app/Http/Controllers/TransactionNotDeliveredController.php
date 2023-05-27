<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionNotDeliveredController extends Controller
{
    public function update($id)
    {
        $user_id = Auth::id();

        $TransactionUpdate = new Transaction;
        $TransactionUpdate->status = 'Received';
        if (Transaction::where('id', $id)->first()->update(array('status' => 'not delivered'))) {
            return response()->json(['success' => true, 'message' => 'Successfully update TransactionNotDelivered data']);
        }
        return response()->json(['success' => false, 'message' => "failed to TransactionNotDelivered"])->setStatusCode(400);
    }
}
