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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // "Transferencia", "Pago Móvil", etc.
            $table->text('description')->nullable(); // Descripción
            $table->string('beneficiary')->nullable(); // Beneficiario
            $table->string('account_number')->nullable(); // Número de cuenta
            $table->string('bank_name')->nullable(); // Nombre del banco
            $table->string('phone')->nullable(); // Teléfono
            $table->string('icon')->default('💳'); // Emoji o icono
            $table->boolean('is_active')->default(true); // Activo/Inactivo
            $table->integer('order')->default(0); // Orden de visualización
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
