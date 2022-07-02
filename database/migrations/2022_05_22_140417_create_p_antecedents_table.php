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
        Schema::create('p_antecedents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id');
            $table->foreignId('illness_id')->nullable();
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('patients')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('illness_id')->references('id')->on('illnesses')
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
        Schema::dropIfExists('p_antecedents');
    }
};
