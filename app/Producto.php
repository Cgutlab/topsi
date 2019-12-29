<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'categoria_id', 'nombre', 'detalles', 'medidas', 'colores', 'unidades', 'codigo', 'video', 'orden', 'keyword',
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function imagenes()
    {
        return $this->hasMany('App\Imagen');
    }
}
