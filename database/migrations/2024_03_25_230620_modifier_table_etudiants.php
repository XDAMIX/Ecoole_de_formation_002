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
            $table->dropColumn('montant');
            $table->string('adresse')->nullable();
            $table->string('id_tarif')->nullable();
            $table->string('tarif')->nullable();
            $table->integer('prix_formation')->nullable();
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
            $table->dropColumn('adresse');
            $table->dropColumn('id_tarif');
            $table->dropColumn('tarif');
            $table->dropColumn('prix_formation');
            $table->integer('montant')->nullable();
        });
    }
};
