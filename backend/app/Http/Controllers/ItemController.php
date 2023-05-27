<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemCollection;
use App\Http\Resources\ItemResource;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $item =   Item::all()->where("seller_id", $user_id);
        return new ItemCollection($item);
    }
    public function show($id)
    {
        return new ItemResource(Item::all()->where('id', '=', $id)->first());
    }
    public function store(Request $request)
    {
        // return
    }
    public function update($id, Request $request)
    {
        $cred = $request->validate([
            'name' => ['requried', 'String'],
            'description' => ['required', 'String'],
            'weight' => ['required', 'decimal:0,2'],
            'price' => ['required', 'decimal:0,2']
        ]);
        $user_id = Auth::id();
    }
    public function destroy($id)
    {
        $user_id = Auth::id();
        Item::all()->where('seller_id', '=', $user_id)->where('id', '=', $id);
        return response()->json(['success' => true, 'message' => "successfully delete item"]);
    }
}
