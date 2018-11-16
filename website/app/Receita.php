<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    protected $table = 'prato';

    protected $primaryKey = 'codPrato';

    public $timestamps = false;

    protected $fillable = ['nomePrato', 'precoPrato', 'quantidadePessoas'];

    protected $guarded = ['codPrato'];
}
