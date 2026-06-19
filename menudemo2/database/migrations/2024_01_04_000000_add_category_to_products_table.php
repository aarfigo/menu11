<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // 1. Creamos la columna con el tipo de dato idéntico al ID de categorías
            $table->unsignedBigInteger('category_id')->nullable()->after('description');
            
            // 2. Vinculamos la clave foránea de forma segura
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['products_category_id_foreign']);
            $table->dropColumn('category_id');
        });
    }
};