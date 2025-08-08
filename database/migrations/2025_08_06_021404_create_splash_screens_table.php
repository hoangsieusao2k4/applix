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
        Schema::create('splash_screens', function (Blueprint $table) {
            $table->id();
            $table->uuid('app_id');


            $table->boolean('show_logo')->default(true);
            $table->string('logo_path')->nullable();
            $table->integer('logo_size')->nullable();

            $table->string('background_color')->default('#ffffff');
            $table->boolean('background_dark_mode')->default(false);
            $table->string('splash_bg_color_dark')->nullable();

            $table->boolean('use_background_image')->default(false);
            $table->enum('background_type', ['1', '2'])->default('1');
            $table->string('background_image_path')->nullable();
            $table->string('background_gif_path')->nullable();
            $table->integer('splash_timeout')->default(2000);
            $table->boolean('splash_status_bar_use_default')->default(true);
            $table->string('splash_status_bar_bg_color')->default('#ffffff');
            $table->tinyInteger('splash_status_bar_icon_color')->default(1); // 1: dark, 2: light

      
            $table->foreign('app_id')->references('id')->on('apps')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('splash_screens');
    }
};
