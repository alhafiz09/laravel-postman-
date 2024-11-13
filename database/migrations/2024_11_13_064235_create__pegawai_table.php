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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('id');    
            $table->string('name');
            $table->char('jenis kelamin pegawai');
            $table->string('no hp pegawai');
            $table->text('alamat pegawai');
            $table->string('email');
            $table->string('status');
            $table->date('tanggal masuk pegawai');
            $table->timestamp('timestamp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_pegawai');
    }
};
