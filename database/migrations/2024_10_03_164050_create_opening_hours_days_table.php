<?php

use App\Models\Kebab;
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
        Schema::create('opening_hours_days', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Kebab::class);
            $table->string('week_day');
            $table->time('opens_at');
            $table->time('closes_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opening_hours_days');
    }
};
