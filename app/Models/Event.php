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

    //aqui é preciso para dizer  que tudo que foi enviado pelo post pode ser atualizado sem restrição.
    // Se eu colocasse algum campo no array, o laravel não ia deixar atualizar esse campo
    protected $guarded = [];

    public function user(){
        //um user  pertence a um usuario
        return $this->belongsTo('App\Models\User');
    }
}
