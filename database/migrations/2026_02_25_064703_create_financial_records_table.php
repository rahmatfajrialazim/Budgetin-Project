<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        public function up(): void
    {
        Schema::create('financial_records', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke tabel users (siapa yang mencatat)
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->string('description'); // Contoh: "Bayar Listrik"
            $table->decimal('amount', 15, 2); // Nominal uang
            $table->enum('type', ['pemasukan', 'pengeluaran']); 
            $table->date('date'); // Tanggal transaksi
            $table->timestamps();
        });
    }
};
