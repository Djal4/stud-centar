<?php

namespace App\Policies;

use App\Models\AccomodationPayment;
use App\Models\Card;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccomodationPaymentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AccomodationPayment  $accomodationPayment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, AccomodationPayment $accomodationPayment)
    {
        return $user->role_id>1 || $accomodationPayment->card_id==Card::find($user->id)->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user,Card $card)
    {
        return $user->id==$card->user_id;
    }

