<?php

namespace App\Http\Controllers;

use App\Models\Pavilion;
use Illuminate\Http\Request;

class PavilionController extends Controller
{
    public function index()
    {
        return response()->json(Pavilion::all());
    }

    public function store(Request $request)
    {
        return response()->json(Pavilion::create([
            "title"=>$request->input('title'),
            "price_per_day"=>$request->input('price_per_day'),
            "location"=>$request->input('location')
        ]));
    }

    public function show($id)
    {
        return response()->json(Pavilion::find($id));
    }

    public function destroy($id)
    {
        return response()->json(Pavilion::destroy($id));
    }
}
