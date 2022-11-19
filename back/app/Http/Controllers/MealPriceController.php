<?php

namespace App\Http\Controllers;

use App\Http\Requests\{
    MealPriceStoreRequest,
    MealPriceUpdateRequest
};
use App\Models\MealPrice;
use Illuminate\Http\Request;

class MealPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', MealPrice::class);

        return response()->json(MealPrice::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\MealPriceStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MealPriceStoreRequest $request)
    {
        $this->authorize('create', MealPrice::class);

        return response()->json([
            "price" => $request->price,
            "card_type_id" => $request->card_type_id,
            "meal_id" => $request->meal_id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', MealPrice::class);

        return response()->json(MealPrice::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\MealPriceUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MealPriceUpdateRequest $request, MealPrice $mealPrice)
    {
        $this->authorize('update', MealPrice::class);

        return response()->json($mealPrice->update($request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', MealPrice::class);
        
        return response()->json(MealPrice::destroy($id));
    }
}
