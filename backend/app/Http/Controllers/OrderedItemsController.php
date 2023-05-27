<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderedItemsCollection;
use App\Http\Resources\OrderedItemsResource;
use App\Models\orderedItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderedItemsController extends Controller
{
    public function index()
    {
        return new OrderedItemsCollection(orderedItems::with("item")->get());
    }
    public function show($id)
    {
        return new OrderedItemsResource(orderedItems::with("Item")->where("id", '=', $id)->first());
    }
    public function store(Request $request)
    {
        $cred = $request->validate([
            'transaction_id' => ['required', 'Integer'],
            'item_id' => ['required', 'Integer'],
            'quantity' => ['required', 'Integer'],
        ]);
        $ordered = new orderedItems;
        $ordered->transaction_id = $request->transaction_id;
        $ordered->item_id = $request->item_id;
        $ordered->quantity = $request->quantity;

        if ($ordered->save()) {
            return response()->json(['success' => true, 'message' => 'Successfully store OrderedItems data'])->setStatusCode(200);
        }
        // if()
        return response()->json(['success' => false, 'message' => "failed to store OrderedItems"])->setStatusCode(400);
    }
}
