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
            $table->foreignId('document_type')->nullable();
            $table->string('document',20);
            $table->string('phone',20);
            $table->string('phone2',20);
            $table->string('direction',60);
            $table->foreignId('relationship')->nullable();
            $table->timestamps();

            $table->foreign('document_type')->references('id')->on('options')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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