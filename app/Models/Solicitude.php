<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitude extends Model
{
    use HasFactory;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'llave',
            'id_tramite',
            'no_solicitud',
            'fecha_solicitud',
            'hora_solicitud',
            'no_solicitud_api',
            'fecha_solicitud_api',
            'hora_solicitud_api',
            'id_electronico',
            'referencia_pago',
            'fecha_pago',
            'hora_pago',
            'stripe_orden_id',
            'stripe_creado',
            'stripe_mensaje',
            'stripe_tipo',
            'stripe_digitos',
            'stripe_red',
            'no_consulta'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id_solicitud',        
        'id_estado',
        'xml_url',
        'no_solicitud'
    ];

}