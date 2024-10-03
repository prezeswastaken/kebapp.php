<?php

use App\Models\Kebab;
use App\Models\Sauce;
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
        Schema::create('kebab_sauce', function (Blueprint $table) {
            $table->foreignIdFor(Kebab::class);
            $table->foreignIdFor(Sauce::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kebab_sauce');
    }
};
