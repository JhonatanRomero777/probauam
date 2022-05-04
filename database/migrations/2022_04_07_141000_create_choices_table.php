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
        Schema::create('choices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sesion_id');
            $table->foreignId('form_id');
            $table->foreignId('question_id');
            $table->foreignId('answer_id');
            $table->timestamps();

            $table->foreign('sesion_id')->references('id')->on('sesions')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('form_id')->references('id')->on('forms')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('question_id')->references('id')->on('questions')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('answer_id')->references('id')->on('answers')
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
        Schema::dropIfExists('choices');
    }
};
