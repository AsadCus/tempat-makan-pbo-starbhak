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
        Schema::create('detail_pesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pesanan_id');
            $table->foreign('pesanan_id')->references('id')->on('pesanans');
            $table->unsignedBigInteger('menu_id');
            $table->foreign('menu_id')->references('id')->on('menus');
            $table->integer('qty');
            $table->integer('jml_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pesanans');
    }
};
