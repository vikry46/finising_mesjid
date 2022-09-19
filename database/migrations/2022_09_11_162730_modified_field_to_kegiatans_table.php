<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kegiatans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_lacon')->nullable()->change();
            $table->unsignedBigInteger('id_penceramah')->nullable()->change();
            $table->text('keterangan')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kegiatans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_lacon')->change();
            $table->unsignedBigInteger('id_penceramah')->change();
            $table->text('keterangan')->change();
        });
    }
};
