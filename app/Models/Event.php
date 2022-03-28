<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    //aqui esta falando para o laravel que o 'items' não vai ser uma string como esta no banco, e sim um array
    protected $casts = [
        'items' => 'array'
    ];

    //dizer para o laravel que esse campo é tipo date
    protected $dates = ['date'];
}
