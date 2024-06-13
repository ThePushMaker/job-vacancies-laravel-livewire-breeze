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
        Schema::table('vacantes', function (Blueprint $table) {
            $table->string('titulo');
            $table->foreignId('salario_id')->nullable()->constrained()->onUpdate('set null')->onDelete('set null');
            $table->foreignId('categoria_id')->nullable()->constrained()->onUpdate('set null')->onDelete('set null');
            $table->string('empresa');
            $table->date('ultimo_dia');
            $table->text('descripcion');
            $table->string('imagen');
            $table->boolean('publicado')->default(true);
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacantes', function (Blueprint $table) {
            $table->dropColumn(['titulo', 'salario_id', 'categoria_id', 'empresa', 'ultimo_dia', 'descripcion', 'imagen', 'publicado', 'user_id']);
        });
    }
};
