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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('entity_id');
            $table->foreignId('companion_id')->nullable();
            $table->string('names',30);
            $table->string('last_names',30);
            $table->foreignId('document_type');
            $table->string('document',20)->unique();
            $table->foreignId('sex');
            $table->date('birthday');
            $table->tinyInteger('height')->unsigned();
            $table->tinyInteger('weight')->unsigned();
            $table->tinyInteger('size')->unsigned();
            $table->string('phone',20);
            $table->string('direction',60);
            $table->foreignId('civil_status');
            $table->foreignId('education_level');
            $table->foreignId('socioeconomic_stratum');
            $table->foreignId('social_security_scheme');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('entity_id')->references('id')->on('entities')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('companion_id')->references('id')->on('companions')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('document_type')->references('id')->on('options')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('sex')->references('id')->on('options')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('civil_status')->references('id')->on('options')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('education_level')->references('id')->on('options')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('socioeconomic_stratum')->references('id')->on('options')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('social_security_scheme')->references('id')->on('options')
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
        Schema::dropIfExists('patients');
    }
};
