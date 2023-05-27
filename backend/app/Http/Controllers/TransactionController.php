<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Http\Resources\TransactionResource;
use App\Http\Resources\TransactionCollection;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        return new TransactionCollection(Transaction::with('locationLogs')->where("user_id", "=", $user_id)->get());
    }
    public function show($id)
    {
        $test =  Transaction::with('locationLogs')->where('id', '=', $id)->first();
        return new  TransactionResource($test);
    }
    public function store(Request $request)
    {
        $cred = $request->validate([
            'item_id' => ['required', 'Integer'],
            'status' => ['required', 'String'],
            'total' => ['required', 'decimal:0,2']
        ]);
        $transaction = new Transaction;

        $transaction->user_id = Auth::id();
        $transaction->item_id = $request->item_id;
        $transaction->status = $request->status;
        $transaction->total = $request->total;

        if ($transaction->save()) {
            return response()->json(['success' => true, 'message' => 'Successfully store Transaction data']);
        }
        return response()->json(['success' => false, 'message' => "failed to store LocationLogs"])->setStatusCode(400);
    }
    public function destroy($id)
    {
        $transaction = Transaction::all()->where('id', '=', $id)->first();
        if ($transaction->delete()) {
            return response()->json(['success' => true, 'message' => 'Successfully destroy Transaction data'])->setStatusCode(200);
        }
        return response()->json(['success' => false, 'message' => "failed to store LocationLogs"])->setStatusCode(400);
    }
}
