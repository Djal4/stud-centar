<?php

namespace App\Http\Controllers;

use App\Http\Requests\{
    CardStoreRequest,
    CardUpdateRequest
};
use App\Models\{
    AccomodationPayment,
    Card,
    MealPrice
};
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Request\CardStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardStoreRequest $request)
    {
        $this->authorize('create', Card::class);

        return response()->json(Card::store([
            "creation_date" => $request->input('creation_date'),
            "expiration_date" => $request->input('expiration_date'),
            "card_type_id" => $request->input('card_type_id'),
            "user_id" => $request->input('user_id')
        ]));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        $this->authorize('view', $card);

        return response()->json($card);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CardUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CardUpdateRequest $request, $id)
    {
        $this->authorize('update', Card::class);

        $card=Card::find($id);
        
        if(empty($request->input('money'))
            &&empty($request->input('breakfast'))
            &&empty($request->input('lunch'))
            &&empty($request->input('dinner')))
            return response()->json($card->update($request->all()));
    }

    public function addMeals(Request $request, Card $card)
    {
        $this->authorize('addMeal', $card);

        $mealPrices=MealPrice::select('price', 'meal_id')->where('card_type_id', '=', $card->card_type_id);
        
        $money=$request->input('breakfast') * $mealPrices[0]->price
                +$request->input('lunch') * $mealPrices[1]->price
                +$request->input('dinner') * $mealPrices[2]->price;

        if($card->money >= $money) {
            $card->breakfast += $request->input('breakfast');
            $card->lunch += $request->input('lunch');
            $card->dinner += $request->input('dinner');
            $card->money -= $money;
        }
        
        return response()->json($card);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Card::class);
        
        return response()->json(Card::destroy($id));
    }
}
