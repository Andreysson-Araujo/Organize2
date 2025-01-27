<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateItemsTableAddLocalId extends Migration
{
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            // Verifica se a coluna 'local' existe antes de removê-la
            if (Schema::hasColumn('items', 'local')) {
                $table->dropColumn('local');
            }

            // Verifica se a coluna 'local_id' já existe antes de adicioná-la
            if (!Schema::hasColumn('items', 'local_id')) {
                $table->unsignedBigInteger('local_id')->nullable();
                $table->foreign('local_id')->references('id')->on('locais')->onDelete('set null');
            }
        });
    }

    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            // Verifica se a coluna 'local_id' existe antes de removê-la
            if (Schema::hasColumn('items', 'local_id')) {
                $table->dropForeign(['local_id']);
                $table->dropColumn('local_id');
            }

            // Verifica se a coluna 'local' não existe antes de adicioná-la
            if (!Schema::hasColumn('items', 'local')) {
                $table->string('local')->nullable();
            }
        });
    }
}
