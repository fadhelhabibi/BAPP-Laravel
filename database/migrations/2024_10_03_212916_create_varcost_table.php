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
        Schema::create('varcost', function (Blueprint $table) {
            $table->id();
            $table->string('kategori')->nullable();
            $table->string('periode')->nullable();
            $table->string('tahun')->nullable();
            $table->string('siteid')->nullable();
            $table->string('sitename')->nullable();
            $table->string('nop')->nullable();
            $table->string('cluster')->nullable();
            $table->string('tiketfiola')->nullable();
            $table->string('tanggalpelaksanaan')->nullable();
            $table->string('aktivity')->nullable();
            $table->string('kodesl')->nullable();
            $table->integer('qty')->nullable();
            $table->string('hargasatuan')->nullable();
            $table->string('fee')->nullable();
            $table->string('statusticket')->nullable();
            $table->string('po')->nullable();
            $table->string('statuspekerjaan')->nullable();
            $table->string('statuspenagihan')->nullable();
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
        Schema::dropIfExists('varcost');
    }
};
