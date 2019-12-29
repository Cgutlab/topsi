<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nombre', 'imagen', 'familia', 'orden',
    ];

    public function productos()
    {
        return $this->hasMany('App\Producto');
    }
}
