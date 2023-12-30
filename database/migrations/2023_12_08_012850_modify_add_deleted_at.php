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
            $table->softDeletes();
        });

        Schema::table('etudiants', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('sessions', function (Blueprint $table) {
            $table->softDeletes();
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
            $table->dropSoftDeletes();
        });
        
        Schema::table('etudiants', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('sessions', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
