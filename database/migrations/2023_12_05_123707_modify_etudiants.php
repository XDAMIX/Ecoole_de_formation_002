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
        Schema::table('etudiants', function (Blueprint $table) {

            $table->dropColumn('session');
            $table->dropColumn('formation');
            $table->dropColumn('contact');

            $table->unsignedBigInteger('session_id')->nullable();
            $table->foreign('session_id')
                ->references('id')
                ->on('sessions');
 

            $table->text('photo')->nullable();
            $table->string('etat_formation')->nullable()->default('En-formation');
            $table->string('code_diplome')->nullable();
            $table->date('date_obt_diplome')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('etudiants', function (Blueprint $table) {
            // Inversez l'ajout de la nouvelle colonne et de la clé étrangère
            $table->dropForeign(['session_id']);
            $table->dropColumn('session_id');

            // Inversez la suppression des colonnes
            $table->string('session');
            $table->string('formation');
            $table->boolean('contact')->default(true);

            // Inversez l'ajout des nouvelles colonnes
            $table->dropColumn('photo');
            $table->dropColumn('etat_formation');
            $table->dropColumn('code_diplome');
            $table->dropColumn('date_obt_diplome');
        });
    }
};
