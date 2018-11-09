<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemProduto extends Model
{
    protected $table = 'itemProduto';

    protected $primaryKey = 'codProduto';

    public $timestamps = false;

    protected $fillable = ['codProduto', 'dataValidade', 'dataCompra', 'quantidadeItem', 'precoItem', 'unidade'];
}
