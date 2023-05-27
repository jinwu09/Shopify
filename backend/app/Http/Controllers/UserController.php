<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $item =   User::all()->where("id", "=", $user_id);
        return $item;
    }
    public function show($id)
    {
        return User::all()->where('id', '=', $id)->first();
    }
}
