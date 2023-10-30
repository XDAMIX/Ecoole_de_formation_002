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

            $table->dropColumn('date_ns');
            $table->string('tel')->nullable();
            $table->string('email')->nullable();
            $table->string('profession')->nullable();
            $table->string('session')->nullable();

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
            $table->date('date_ns');
            $table->dropColumn('tel');
            $table->dropColumn('email');
            $table->dropColumn('profession');
            $table->dropColumn('session');
        });
    }
};
