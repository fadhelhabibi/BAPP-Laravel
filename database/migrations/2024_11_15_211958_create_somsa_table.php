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
        Schema::create('somsa', function (Blueprint $table) {
            $table->id();
            $table->string('cluster')->nullable();
            $table->string('siteid')->nullable();
            $table->string('sitename')->nullable();
            $table->string('type')->nullable();
            $table->string('ticketnumber')->nullable();
            $table->string('ac')->nullable();
            $table->string('grounding')->nullable();
            $table->string('penerangan')->nullable();
            $table->string('shelter')->nullable();
            $table->string('kebersihan')->nullable();
            $table->string('sparepart')->nullable();
            $table->string('harga')->nullable();
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
        Schema::dropIfExists('somsa');
    }
};
