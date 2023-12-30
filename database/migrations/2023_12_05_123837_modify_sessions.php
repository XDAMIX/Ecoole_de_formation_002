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
        Schema::table('sessions', function (Blueprint $table) {

            $table->dropColumn('prof');    
            $table->dropColumn('formation');

            $table->unsignedBigInteger('formation_id')->nullable();
            $table->foreign('formation_id')
                ->references('id')
                ->on('formations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sessions', function (Blueprint $table) {
            // Inversez la suppression des colonnes
            $table->string('prof');
            $table->string('formation');

            // Inversez l'ajout de la clé étrangère
            $table->dropForeign(['formation_id']);
            $table->dropColumn('formation_id');
        });
    }
};
