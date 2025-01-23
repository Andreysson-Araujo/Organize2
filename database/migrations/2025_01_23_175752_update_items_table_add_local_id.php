<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateItemsTableAddLocalId extends Migration
{
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            // Remove o campo 'local'
            $table->dropColumn('local');
            
            // Adiciona o campo 'local_id' como chave estrangeira
            $table->unsignedBigInteger('local_id')->nullable();
            $table->foreign('local_id')->references('id')->on('locais')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            // Adiciona o campo 'local' de volta
            $table->string('local')->nullable();

            // Remove o campo 'local_id'
            $table->dropForeign(['local_id']);
            $table->dropColumn('local_id');
        });
    }
}