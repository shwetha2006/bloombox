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
        Schema::create('bouquet_shipments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->date('shipment_date');
            $table->string('shipment_address');
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('city');
            $table->string('postal_code');
            $table->decimal('shipment_cost', 10, 2);
            $table->string('shipment_status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bouquet_shipments');
    }
};
