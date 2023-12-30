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

            $table->date('date_naissance')->nullable()->before('wilaya');
            $table->string('lieu_naissance')->nullable()->before('wilaya');
            $table->date('date_debut_formation')->nullable()->before('code_diplome');
            $table->date('date_fin_formation')->nullable()->before('code_diplome');
            $table->date('mention_diplome')->nullable();
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
            
            $table->dropColumn('date_naissance');
            $table->dropColumn('lieu_naissance');
            $table->dropColumn('date_debut_formation');
            $table->dropColumn('date_fin_formation');
            $table->dropColumn('mention_diplome');
        });
    }
};
