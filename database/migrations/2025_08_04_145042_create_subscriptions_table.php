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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('app_id')->constrained('apps')->cascadeOnDelete();
            $table->string('plan_type');
            $table->bigInteger('price'); // lưu giá thực trả (đơn vị: đồng)
            $table->string('transaction_ref')->unique(); // vnp_TxnRef
            $table->string('vnp_response_code')->nullable();
            $table->string('vnp_transaction_no')->nullable(); // vnp_TransactionNo
            $table->boolean('is_active')->default(false);
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
