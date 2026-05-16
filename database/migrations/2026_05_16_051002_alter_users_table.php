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
        Schema::table('users', function (Blueprint $table) {
            // Adicionando os campos planejados na sua modelagem
            $table->string('tipo', 10)->default('aluno'); // aluno | admin
            $table->boolean('ativo')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Se fizermos um rollback, removemos esses campos
            $table->dropColumn(['tipo', 'ativo']);
        });
    }
};
