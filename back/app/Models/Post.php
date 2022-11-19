<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
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
        'text',
        'author_id',
        'creation_time'
    ];
/*
    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }
    */
}
