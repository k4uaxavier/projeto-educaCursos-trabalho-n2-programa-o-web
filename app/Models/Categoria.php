<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model {
    public $timestamps = false; // Desativa porque tiramos o updated_at na migration
    protected $fillable = ['nome', 'descricao'];
}