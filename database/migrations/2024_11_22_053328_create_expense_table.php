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
        Schema::create('expense', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user')->nullable();
            $table->string('category')->nullable();
            $table->string('subcategory')->nullable();
            $table->string('area')->nullable();
            $table->string('title')->nullable();
            $table->string('date')->nullable();
            $table->string('site')->nullable();
            $table->string('ticket')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('pengeluaran')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('expense');
    }
};
