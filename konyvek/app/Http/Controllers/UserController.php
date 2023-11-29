<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $users = response()->json(user::all());
        return $users;
    }

    public function show($id){
        $user = response()->json(user::find($id));
        return $user;
    }

    public function store(Request $request){
        $user = new user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->permission = $request->permission;
        $user->save();
    }

    public function update(Request $request, $id){
        $user = user::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->permission = $request->permission;
        $user->save();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //find helyett a paraméter
        $user->delete();
    }
}
