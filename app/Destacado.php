<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destacado extends Model
{
    protected $fillable = [
        'titulo', 'imagen', 'vinculo', 'orden',
    ];
}
