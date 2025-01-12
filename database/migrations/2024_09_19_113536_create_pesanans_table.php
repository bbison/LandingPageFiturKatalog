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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id');
            $table->foreignId('user_id');
            $table->foreignId('keuangan_id')->nullable();
            $table->integer('jumlah')->default('1');
            $table->foreignId('alamat_penerima_id')->nullable();
            $table->text('resi')->nullable();
            $table->text('catatan')->nullable();
            $table->text('snap_token')->nullable();
            $table->text('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
