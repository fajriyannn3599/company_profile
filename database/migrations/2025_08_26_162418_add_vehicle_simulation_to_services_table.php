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
        Schema::table('services', function (Blueprint $table) {
            $table->boolean('vehicle_simulation')->default(false);
            $table->boolean('marriage_simulation')->default(false);
            $table->boolean('property_simulation')->default(false);
            $table->boolean('education_simulation')->default(false);
            $table->boolean('hajj_simulation')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            //
        });
    }
};
