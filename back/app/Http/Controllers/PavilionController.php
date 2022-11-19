<?php

namespace App\Http\Controllers;

use App\Http\Requests\PavilionStoreRequest;
use App\Models\Pavilion;
use Illuminate\Http\Request;

class PavilionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Pavilion::class);

        return response()->json(Pavilion::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PavilionStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PavilionStoreRequest $request)
    {
        $this->authorize('create', Pavilion::class);
        
        return response()->json(Pavilion::create([
            "title" => $request->input('title'),
            "price_per_day" => $request->input('price_per_day'),
            "location" => $request->input('location')
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', Pavilion::class);

        return response()->json(Pavilion::find($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('destroy',Pavilion::class);

        return response()->json(Pavilion::destroy($id));
    }
}
