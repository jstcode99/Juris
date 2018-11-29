<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Clientes extends Model
{
    use SoftDeletes;

    protected $table='personas';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'tipodocumento','documento','primernombre','segundonombre',
        'primerapellido','segundoapellido','estado','tarjetaprofesional',
        'estrato','direccion','telefono','name', 'email', 'password',
    ];
}
