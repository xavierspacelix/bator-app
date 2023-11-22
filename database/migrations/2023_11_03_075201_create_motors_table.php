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
        Schema::create('motors', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('slug');
            $table->foreignId('seller_id')->constrained()->onDelete(null);
            $table->foreignId('category_id')->constrained()->onDelete(null);
            $table->foreignId('merk_id')->constrained()->onDelete(null);
            $table->foreignId('fuel_id')->constrained()->onDelete(null);
            $table->string('name');
            $table->string('description');
            $table->string('price');
            $table->enum('kondisi', ['baru', 'bekas']);
            $table->year('tahun');
            $table->integer('jarak_tempuh');
            $table->string('kapasitas_tank');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motors');
    }
};
