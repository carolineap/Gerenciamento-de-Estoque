<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirm extends Model
{
    protected $table = 'confirm';

    protected $fillable = ['eventos_id', 'name', 'email', 'phone', 'number'];
}
