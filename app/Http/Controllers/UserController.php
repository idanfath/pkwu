<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function fetchall(){
        $user = User::all();

        if (!$user){
            return response()->json("no user found");
        };
        return response()->json($user);
    }
    public function fetchid($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json("no user found");
        };
        return response()->json($user);
    }
    public function delete($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json("no user found");
        }

        $user->delete();
    }
}
