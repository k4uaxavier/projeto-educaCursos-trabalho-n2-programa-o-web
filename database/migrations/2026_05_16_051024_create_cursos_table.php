<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            
            // Chaves Estrangeiras (Relacionamentos)
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
            $table->foreignId('criado_por')->nullable()->constrained('users')->onDelete('set null');
            
            // Campos específicos do Curso
            $table->string('nome', 150);
            $table->text('descricao');
            $table->integer('carga_horaria');
            $table->string('modalidade', 15); // online | presencial | ead
            $table->boolean('ativo')->default(true);
            
            // Timestamps (cria automaticamente criado_em e atualizado_em)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};