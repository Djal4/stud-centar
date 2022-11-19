<?php

namespace App\Http\Controllers;

use App\Http\Requests\PavilionStoreRequest;
use App\Models\Pavilion;
use Illuminate\Http\Request;

class PavilionController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny',Pavilion::class);
        return response()->json(Pavilion::all());
    }

    public function store(PavilionStoreRequest $request)
    {
        $this->authorize('create',Pavilion::class);
        return response()->json(Pavilion::create([
            "title"=>$request->input('title'),
            "price_per_day"=>$request->input('price_per_day'),
            "location"=>$request->input('location')
        ]));
    }

    public function show($id)
    {
        $this->authorize('view',Pavilion::class);
        return response()->json(Pavilion::find($id));
    }

    public function destroy($id)
    {
        $this->authorize('destroy',Pavilion::class);
        return response()->json(Pavilion::destroy($id));
    }
}
