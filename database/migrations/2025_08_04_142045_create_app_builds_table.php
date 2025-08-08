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
        Schema::create('app_builds', function (Blueprint $table) {
            $table->id();
            // dùng foreignUuid để phù hợp với app.id là UUID
            $table->foreignUuid('app_id')->constrained('apps')->cascadeOnDelete();
            $table->enum('status', ['queued', 'running', 'success', 'failed']);
            $table->text('log')->nullable();
            $table->string('output_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_builds');
    }
};
