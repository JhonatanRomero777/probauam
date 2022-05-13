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
        Schema::create('entities', function (Blueprint $table) {
            $table->id();
            $table->string('name',60);
            $table->string('direction',60);
            //$table->string('nit',10)->unique();
            $table->string('nit',10);
            $table->string('phone',20);
            $table->foreignId('city_id');
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entities');
    }
};