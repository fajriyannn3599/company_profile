<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('page_heroes', function (Blueprint $table) {
            $table->id();
            $table->string('page_identifier')->unique(); // home, about, services, etc.
            $table->string('title');
            $table->text('subtitle')->nullable();
            $table->string('background_image')->nullable();
            $table->string('background_overlay_color')->default('#000000');
            $table->integer('background_overlay_opacity')->default(50); // 0-100
            $table->enum('text_color', ['white', 'dark'])->default('white');
            $table->enum('text_alignment', ['left', 'center', 'right'])->default('center');
            $table->string('cta_primary_text')->nullable();
            $table->string('cta_primary_url')->nullable();
            $table->string('cta_secondary_text')->nullable();
            $table->string('cta_secondary_url')->nullable();
            $table->enum('height', ['small', 'medium', 'large', 'fullscreen'])->default('large');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('page_heroes');
    }
};
