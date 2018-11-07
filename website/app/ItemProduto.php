<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemProduto extends Model
{
    protected $table = 'itemProduto';

    protected $primaryKey = ['codProduto', 'dataValidade', 'dataCompra'];

    public $timestamps = false;

    protected $fillable = ['dataValidade', 'dataCompra', 'quantidadeItem', 'precoItem', 'unidade'];

    protected $guarded = ['codProduto'];
}
