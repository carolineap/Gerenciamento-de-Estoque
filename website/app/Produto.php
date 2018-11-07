<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produto';

    protected $primaryKey = 'codProduto';

    public $timestamps = false;

    protected $fillable = ['limite', 'nomeProduto', 'fornecido', 'categoria', 'marca'];

    protected $guarded = ['codProduto'];
}
