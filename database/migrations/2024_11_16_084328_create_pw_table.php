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
        Schema::create('pw', function (Blueprint $table) {
            $table->id();
            $table->string('ticketnumber')->nullable();
            $table->string('cluster')->nullable();
            $table->string('siteid')->nullable();
            $table->string('sitename')->nullable();
            $table->string('pic')->nullable();
            $table->string('notlppic')->nullable();
            $table->string('tipepenjagasite')->nullable();
            $table->string('hargapemberdayaan')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('pw');
    }
};
