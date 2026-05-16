<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetricaAcesso extends Model
{
    // Como criamos essa tabela apenas para registrar logs de acesso rápidos,
    // se você não colocou os campos default 'created_at' e 'updated_at' nela, desative:
    public $timestamps = false;

    protected $fillable = [
        'user_id', 
        'url_acessada', 
        'ip_endereco', 
        'data_acesso'
    ];
}