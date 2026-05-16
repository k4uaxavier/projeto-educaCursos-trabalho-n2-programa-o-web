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
        Schema::create('certificados', function (Blueprint $table) {
            $table->id();
            
            // Chaves Estrangeiras
            $table->foreignId('inscricao_id')->constrained('inscricoes')->onDelete('cascade');
            $table->foreignId('emitido_por')->nullable()->constrained('users')->onDelete('set null');
            
            // Campos específicos do Certificado
            $table->string('codigo_unico', 64)->unique();
            $table->integer('via')->default(1);
            
            // Data de emissão customizada conforme seu planejamento
            $table->timestamp('emitido_em')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificados');
    }
};