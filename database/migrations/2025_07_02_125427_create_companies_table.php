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
    Schema::create('companies', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->string('p_iva')->nullable(); // opzionale per PMI o enti
        $table->string('settore')->nullable(); // es. IT, manifattura, servizi
        $table->enum('dimensione', ['micro', 'piccola', 'media', 'grande'])->default('micro');
        $table->string('paese')->nullable(); // per future logiche SCI geografiche
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
