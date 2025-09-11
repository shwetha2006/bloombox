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
        Schema::table('order_items', function (Blueprint $table) {
            // Remove the JSON column
            $table->dropColumn('add_ons');

            // Add foreign keys for add_on and parent order item
            $table->foreignId('add_on_id')->nullable()->constrained('add_ons')->onDelete('cascade');
            $table->foreignId('parent_order_item_id')->nullable()->constrained('order_items')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            // Add the JSON column back in rollback
            $table->json('add_ons')->nullable();

            // Drop foreign keys and columns
            $table->dropForeign(['add_on_id']);
            $table->dropColumn('add_on_id');

            $table->dropForeign(['parent_order_item_id']);
            $table->dropColumn('parent_order_item_id');
        });
    }
};
