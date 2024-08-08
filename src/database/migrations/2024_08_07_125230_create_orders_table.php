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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // 訂單 ID
            $table->foreignId('bnb_id')->constrained('bnbs'); // 旅宿 ID
            $table->foreignId('room_id')->constrained('rooms'); // 房間 ID
            $table->enum('currency', ['TWD', 'USD', 'JPY']); // 付款幣別
            $table->decimal('amount', 8, 2); // 訂單金額
            $table->date('check_in_date'); // 入住日
            $table->date('check_out_date'); // 退房日
            $table->timestamp('created_at')->useCurrent(); // 訂單下訂時間
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
