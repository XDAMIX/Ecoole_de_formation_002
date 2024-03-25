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
        Schema::create('type_paiements', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('formation_id')->nullable();
            $table->foreign('formation_id')
                ->references('id')
                ->on('formations');
 

            $table->string('type_id')->nullable();
            $table->string('titre')->nullable();
            $table->integer('prix')->default(0);
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
        Schema::dropIfExists('type_paiements');
    }
};
