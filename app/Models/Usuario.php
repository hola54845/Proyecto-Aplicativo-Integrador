<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nombre',
        'email',
        'password',
    ];
}
