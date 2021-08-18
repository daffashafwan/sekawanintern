<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignid('admin_id');
            $table->foreign('admin_id')
            ->references('id')
            ->on('admin')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignid('driver_id');
            $table->foreign('driver_id')
            ->references('id')
            ->on('driver')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignid('kendaraan_id');
            $table->foreign('kendaraan_id')
            ->references('id')
            ->on('kendaraan')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->datetime('waktu_pemesanan');
            $table->foreignid('penyetuju_id')->nullable();
            $table->foreign('penyetuju_id')
            ->references('id')
            ->on('penyetuju')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('pemesanan');
    }
}
