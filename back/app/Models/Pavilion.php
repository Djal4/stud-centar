<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Model
};

class Pavilion extends Model
{
    use HasFactory;

    public $timestamps=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable=[
        'title',
        'price_per_day',
        'location'
    ];
}
