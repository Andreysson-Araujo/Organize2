<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMarcaToItemsTable extends Migration
{
    /**
     * Adiciona a coluna 'marca' à tabela 'items'.
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->string('marca')->after('categoria'); // Adiciona a coluna 'marca' após 'categoria'
        });
    }

    /**
     * Remove a coluna 'marca' da tabela 'items' (caso necessário).
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('marca');
        });
    }
}
