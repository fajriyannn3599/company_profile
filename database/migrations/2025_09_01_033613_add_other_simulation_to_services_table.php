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
            $table->boolean('working_capital_simulation')->default(false);
            $table->boolean('business_machine_simulation')->default(false);
            $table->boolean('business_renovation_simulation')->default(false);
            $table->boolean('deposit_simulation')->default(false);
            $table->boolean('saving_simulation')->default(false);
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
