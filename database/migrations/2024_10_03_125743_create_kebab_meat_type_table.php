<?php

use App\Models\Kebab;
use App\Models\MeatType;
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
        Schema::create('kebab_meat_type', function (Blueprint $table) {
            $table->foreignIdFor(Kebab::class);
            $table->foreignIdFor(MeatType::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kebab_meat_type');
    }
};
