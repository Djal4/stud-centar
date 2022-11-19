<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Model
};

class MealPrice extends Model
{
    use HasFactory;

    public $timestamps=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable=[
        'card_type_id',
        'meal_id',
        'price'
    ];
}
