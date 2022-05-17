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
        Schema::create('companions', function (Blueprint $table) {
            $table->id();
            $table->string('names',30);
            $table->string('last_names',30);
            $table->string('phone',20);
            $table->string('cellphone',20);
            $table->string('direction',60);
            $table->foreignId('relationship')->nullable();
            $table->timestamps();

            $table->foreign('relationship')->references('id')->on('options')
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
        Schema::dropIfExists('companions');
    }
};