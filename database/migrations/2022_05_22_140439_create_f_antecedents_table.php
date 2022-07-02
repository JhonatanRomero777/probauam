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
        Schema::create('f_antecedents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id');
            $table->foreignId('pharmacological_id')->nullable();
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('patients')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('pharmacological_id')->references('id')->on('options')
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
        Schema::dropIfExists('f_antecedents');
    }
};
