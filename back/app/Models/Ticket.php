<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public $timestamps=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable=[
        'content',
        'user_id',
        'parent_id',
        'time'
    ];
/*
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    */
}
