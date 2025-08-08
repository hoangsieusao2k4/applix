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
        Schema::table('apps', function (Blueprint $table) {
            //
              $table->boolean('is_premium')->default(false);
        $table->string('plan_type')->nullable();
        $table->timestamp('premium_expires_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apps', function (Blueprint $table) {
             $table->dropColumn(['is_premium', 'plan_type', 'premium_expires_at']);
        });
    }
};
