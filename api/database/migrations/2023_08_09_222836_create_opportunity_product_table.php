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
        Schema::create('opportunity_product', function (Blueprint $table) {
            $table->id();
            $table->uuid("opportunity_identify")->index();
            $table->uuid("product_identify")->index();
            $table->timestamps();

            $table->foreign('opportunity_identify')->references('uuid')
                ->on('opportunities');
            $table->foreign('product_identify')->references('uuid')
                ->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opportunity_product');
    }
};
