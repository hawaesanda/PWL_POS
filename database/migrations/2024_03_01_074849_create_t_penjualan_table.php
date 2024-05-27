<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTPenjualanTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('t_penjualan')) {
            Schema::create('t_penjualan', function (Blueprint $table) {
                $table->bigIncrements('penjualan_id');
                $table->unsignedBigInteger('user_id');
                $table->string('pembeli', 50);
                $table->string('penjualan_kode', 20);
                $table->dateTime('penjualan_tanggal');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('t_penjualan');
    }
};
