<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    protected $fillable = [
        'inscricao_id', 
        'emitido_por', 
        'codigo_validacao', 
        'data_emissao'
    ];
}