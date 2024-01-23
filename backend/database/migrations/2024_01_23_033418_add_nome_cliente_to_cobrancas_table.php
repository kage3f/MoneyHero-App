<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('cobrancas', function (Blueprint $table) {
        $table->string('nome_cliente')->nullable(); // Adiciona a coluna 'nome_cliente'
    });
}

public function down()
{
    Schema::table('cobrancas', function (Blueprint $table) {
        $table->dropColumn('nome_cliente'); // Remove a coluna na rollback
    });
}

};
