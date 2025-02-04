<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('email_verified_at'); // Remove o campo email_verified_at
            $table->string('username')->nullable(); // Permite valores nulos
            $table->boolean('is_admin')->default(false)->after('password'); // Adiciona is_admin (false por padrão)
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('email_verified_at')->nullable(); // Restaura o email_verified_at
            $table->dropColumn(['username', 'is_admin']); // Remove os campos adicionados
        });
    }
};