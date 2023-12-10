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
        Schema::table('profs', function (Blueprint $table) {
            $table->string('wilaya')->nullable();
            $table->string('adresse')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('lieu_naissance')->nullable();
            $table->string('diplome')->nullable();

            $table->dropColumn('age');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profs', function (Blueprint $table) {
            $table->dropColumn('wilaya');
            $table->dropColumn('adresse');
            $table->dropColumn('date_naissance');
            $table->dropColumn('lieu_naissance');
            $table->dropColumn('diplome');

            $table->integer('age')->nullable();
        });
    }
};
