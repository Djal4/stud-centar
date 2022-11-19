<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Model
};

class Card extends Model
{
    use HasFactory;

    public $timestamps=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable=[
        'user_id',
        'creation_date',
        'expiration_date',
        'money',
        'breakfast',
        'lunch',
        'dinner',
        'card_type_id',
        'pavilion_id',
        'room'
    ];
}
