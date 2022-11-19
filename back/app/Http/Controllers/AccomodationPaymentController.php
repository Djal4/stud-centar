<?php

namespace App\Http\Controllers;

use App\Models\{
    AccomodationPayment,
    Card
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccomodationPaymentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Card $card)
    {
        $this->authorize('create', $card);

        if(!empty($request->input('flag'))) {
            $price=DB::table('cards')
                ->join('pavilion', 'pavilion.id', '=', 'cards.pavilion_id')
                ->select('pavilion.price')
                ->where('cards.id', '=', $card->id)
                ->limit(1)
                ->get();
        }
        if($card->money > $price)
            $card->money -= $price;
        return response()->json(
            AccomodationPayment::create([
                "payment_date"=>$request->payment_date,
                "card_id"=>$card->id
            ])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AccomodationPayment $accomodationPayment)
    {
        $this->authorize('view', $accomodationPayment);
        return response()->json([
            "payments" => AccomodationPayment::select('payment_date')
                ->where('card_id', '=', $accomodationPayment->id)
                ->orderByDesc('payment_date')
                ->get(),
            "student" => Card::find($accomodationPayment->id)
        ]);
    }
}
