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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger("item_id")->nullable();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->string("status");
            $table->double('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign('transaction_user_id_foreign');
            $table->dropIndex('transaction_user_id_index');
            $table->dropColumn('user_id');
            $table->dropForeign('transaction_seller_id_foreign');
            $table->dropIndex('transaction_seller_id_index');
            $table->dropColumn('item_id');
        });
    }
};
