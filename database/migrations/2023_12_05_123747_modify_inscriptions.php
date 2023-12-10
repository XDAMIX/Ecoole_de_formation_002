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
        Schema::table('inscriptions', function (Blueprint $table) {
            // Supprimer les colonnes existantes
            $table->dropColumn('formation');
            $table->dropColumn('session');
            $table->dropColumn('montant');
            $table->dropColumn('contact');

            // Ajouter de nouvelles colonnes
            $table->boolean('validation')->default(false);

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
        Schema::table('inscriptions', function (Blueprint $table) {
            // Inverser les ajouts de colonnes
            $table->string('formation');
            $table->string('session');
            $table->string('montant');
            $table->boolean('contact')->default(false);

            // Supprimer les colonnes ajoutées
            $table->dropColumn('validation');
            $table->dropForeign(['formation_id']);
            $table->dropColumn('formation_id');
        });
    }
};
