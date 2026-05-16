<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model {
    protected $fillable = ['curso_id', 'user_id', 'progresso', 'status'];
}