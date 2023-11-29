<?php

namespace App\Http\Controllers;

use App\Models\Lending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LendingController extends Controller
{
    public function index(){
        $lendings = response()->json(Lending::all());
        return $lendings;
    }

    public function show ($user_id, $copy_id, $start)
    {
        $lending = Lending::where('user_id', $user_id)->where('copy_id', $copy_id)->where('start', $start)->get();
        return $lending[0];
    }


    public function store(Request $request){
        $lending = new Lending();
        $lending->user_id = $request->user_id;
        $lending->copy_id = $request->copy_id;
        $lending->start = $request->start;
    }

    

    public function update(Request $request, $user_id, $copy_id, $start){
        $lending = $this->show($user_id, $copy_id, $start);
        $lending->user_id = $request->user_id;
        $lending->copy_id = $request->copy_id;
        $lending->start = $request->start;
        $lending->save();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lending $lending)
    {
        //find helyett a paraméter
        $lending->delete();
    }
}
