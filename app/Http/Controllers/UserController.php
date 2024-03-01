<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
    public function update(request $request, $id)
    {
        $user = User::find($request->id);
        if (!user) {
            return response()->json("no user found");
        }

        $user->name = $request->name;
    }
}
