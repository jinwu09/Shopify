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
        Schema::create('ordered_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaction_id');
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('quantity');
            $table->double('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordered_items');
        Schema::table('ordered_items', function (Blueprint $table) {
            $table->dropForeign('ordered_items_transaction_id_foreign');
            $table->dropIndex('ordered_items_transaction_id_index');
            $table->dropColumn('transaction_id');

            $table->dropForeign('ordered_items_user_id_foreign');
            $table->dropIndex('ordered_items_user_id_index');
            $table->dropColumn('user_id');
        });
    }
};
