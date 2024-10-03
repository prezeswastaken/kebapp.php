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
        Schema::create('kebabs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo_url')->nullable();
            $table->string('address');
            $table->bigInteger('coordinates_x');
            $table->bigInteger('coordinates_y');
            $table->string('opening_year')->nullable();
            $table->string('closing_year')->nullable();
            $table->string('status');
            $table->boolean('is_kraft');
            $table->boolean('is_food_truck');
            $table->string('network')->nullable();
            $table->string('app_link')->nullable();
            $table->string('website_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kebabs');
    }
};
