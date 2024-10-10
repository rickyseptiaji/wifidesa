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
                Schema::create('bills', function (Blueprint $table) {
                    $table->id();
                    $table->foreignId('client_id')->constrained()->onDelete('cascade');
                    $table->date('tgl_tagihan');
                    $table->date('tgl_pembayaran')->nullable();
                    $table->boolean('pembayaran')->default(false);
                    $table->timestamps();
                });
            }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
