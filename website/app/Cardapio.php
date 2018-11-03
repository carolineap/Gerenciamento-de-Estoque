<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cardapio extends Model
{
    protected $table = 'cardapios';

    protected $fillable = ['name'];
}
