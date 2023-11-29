<?php

namespace App\Http\Controllers;

use App\Models\Copy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CopyController extends Controller
{
    public function index(){
        $Copys = response()->json(Copy::all());
        return $Copys;
    }

    public function show($id){
        $Copy = response()->json(Copy::find($id));
        return $Copy;
    }

    public function store(Request $request){
        $Copy = new Copy();
        $Copy->book_id = $request->book_id;
        $Copy->hardcovered = $request->hardcovered;
        $Copy->publication = $request->publication;
        $Copy->status = $request->status;
        $Copy->save();
    }

    public function update(Request $request, $id){
        $Copy = Copy::find($id);
        $Copy->book_id = $request->book_id;
        $Copy->hardcovered = $request->hardcovered;
        $Copy->publication = $request->publication;
        $Copy->status = $request->status;
        $Copy->save();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Copy $Copy)
    {
        //find helyett a paraméter
        $Copy->delete();
    }
}
