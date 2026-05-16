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
        Schema::create('inscricoes', function (Blueprint $table) {
            $table->id();
            
            // Chaves Estrangeiras
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade');
            
            // Campos específicos da Inscrição
            $table->string('status', 12)->default('ativa'); // ativa | cancelada | concluida
            $table->decimal('progresso', 5, 2)->default(0.00); // Ex: 000.00 até 100.00
            
            // Datas Customizadas conforme seu planejamento
            $table->timestamp('inscrito_em')->useCurrent();
            $table->timestamp('concluido_em')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscricoes');
    }
};