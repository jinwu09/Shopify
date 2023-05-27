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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->double('weight');
            $table->double('price');
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.mnbbn
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign('item_seller_id_foreign');
            $table->dropIndex('item_seller_id_index');
            $table->dropColumn('seller_id');
        });
    }
};
