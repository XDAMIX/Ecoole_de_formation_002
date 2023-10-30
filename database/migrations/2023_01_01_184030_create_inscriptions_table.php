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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sexe');
            $table->string('nom');
            $table->integer('age');
            $table->string('wilaya');
            $table->string('formation');
            $table->string('tel');
            $table->boolean('contact')->default(false);
            $table->text('details',16383)->default('Nouvelle-inscription');
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
        Schema::dropIfExists('inscription');
    }
};
