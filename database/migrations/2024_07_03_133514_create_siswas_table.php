<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_siswas_table.php
public function up()
{
    Schema::create('siswas', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->integer('umur');
        $table->foreignId('sekolah_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}

};
