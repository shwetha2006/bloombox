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
        Schema::table('add_ons', function (Blueprint $table) {
            $table->text('description')->nullable()->after('price');
            $table->integer('stock_quantity')->default(0)->after('image');
        });
    }

    public function down(): void
    {
        Schema::table('add_ons', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('stock_quantity');
        });
    }
};
