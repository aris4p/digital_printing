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
            $table->string('id_xendit');
            $table->string('external_id');
            $table->string('product_id');
            $table->string('name');
            $table->string('email');
            $table->string('nohp');
            $table->string('qty');
            $table->string('harga_total');
            $table->string('gambar');
            $table->string('pesan');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
