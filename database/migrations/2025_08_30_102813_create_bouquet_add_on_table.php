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
        Schema::create('bouquet_add_on', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bouquet_id')->constrained('bouquets')->onDelete('cascade');
            $table->foreignId('add_on_id')->constrained('add_ons')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bouquet_add_on');
    }
};
