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
        Schema::create('cobrancas', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor', 8, 2); // Valor com duas casas decimais
            $table->date('data_registro'); // Data de registro
            $table->enum('tipo', ['boleto', 'pix', 'credito']); // Tipo de cobrança
            $table->enum('status', ['confirmada', 'em_aberto', 'atrasada']); // Status da cobrança
            $table->string('telefone'); // Telefone
            $table->timestamps(); // Cria colunas created_at e updated_at
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cobrancas');
    }
};
