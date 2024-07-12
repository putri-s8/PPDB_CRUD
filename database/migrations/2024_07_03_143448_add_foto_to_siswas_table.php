<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 // database/migrations/xxxx_xx_xx_xxxxxx_add_foto_to_siswas_table.php
// database/migrations/xxxx_xx_xx_xxxxxx_add_foto_to_siswas_table.php
public function up()
{
    Schema::table('siswas', function (Blueprint $table) {
        $table->string('foto')->nullable()->after('umur');
    });
}

public function down()
{
    Schema::table('siswas', function (Blueprint $table) {
        $table->dropColumn('foto');
    });
}
};