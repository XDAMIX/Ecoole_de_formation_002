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
        Schema::create('cours', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('formation_id');
            $table->foreign('formation_id')
            ->references('id')
            ->on('formations');

            $table->unsignedBigInteger('prof_id');
            $table->foreign('prof_id')
            ->references('id')
            ->on('profs');

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
        Schema::dropIfExists('cours');
    }
};
