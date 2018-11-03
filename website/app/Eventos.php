<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    protected $table = 'eventos';

    protected $fillable = ['name', 'descricao', 'data', 'capa'];

    protected $dates = ['data'];


    public function confirm()
    {
        return $this->hasMany('App\Confirm', 'eventos_id');
    }
}
