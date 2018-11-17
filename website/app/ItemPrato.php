<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPrato extends Model
{
    protected $table = 'itemPrato';

    protected $primaryKey = 'codPrato';

    public $timestamps = false;

    protected $fillable = ['codPrato', 'codProduto', 'quantidadeProduto', 'unidade'];
}
