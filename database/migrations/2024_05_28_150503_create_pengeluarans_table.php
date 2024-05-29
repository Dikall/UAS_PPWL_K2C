<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('tanggal_tranksaksi');
            $table->decimal('total_pengeluaran', 10, 2);
            $table->string('metode_pembayaran')->nullable();
            $table->text('catatan')->nullable();
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengeluarans', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::dropIfExists('pengeluarans');
    }
};
