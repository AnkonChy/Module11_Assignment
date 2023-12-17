<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('sell_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product')->references('id')->on('products')
                ->cascadeOnDelete()->restrictOnDelete();
            $table->integer('quantity_sold');
            $table->timestamp('sold_at')->default(now());
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('sell_details');
    }
};
