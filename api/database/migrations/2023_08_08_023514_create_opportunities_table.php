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
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->index();
            $table->uuid("client_identify")->index();
            $table->uuid("user_identify")->index();
            $table->string("name");
            $table->decimal("value", 12, 2);
            $table->enum("status", \App\Enums\OpportunityStatusEnum::getValues())
                ->default(\App\Enums\OpportunityStatusEnum::WAITING());
            $table->timestamps();

            $table->foreign('user_identify')->references('uuid')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opportunities');
    }
};
