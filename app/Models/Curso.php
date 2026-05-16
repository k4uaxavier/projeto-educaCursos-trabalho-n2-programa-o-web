<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model {
    protected $fillable = ['categoria_id', 'criado_por', 'nome', 'descricao', 'carga_horaria', 'modalidade', 'ativo'];
}