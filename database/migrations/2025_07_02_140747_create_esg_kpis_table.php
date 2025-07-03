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
        Schema::create('esg_kpis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('kpi_nome');
            $table->decimal('valore', 12, 2);
            $table->string('unita_misura');
            $table->enum('categoria', ['climate','energy','waste','water','governance'])
                ->default('climate');
            $table->string('riferimento_normativo')->nullable();
            $table->string('periodo');   // es. “Q2 2025”
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('esg_kpis');
    }
};
