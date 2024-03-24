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
        Schema::table('informations', function (Blueprint $table) {
            $table->string('logo_blanc')->nullable();
            $table->string('logo_couleurs')->nullable();
            $table->string('num_agrement')->nullable();
            $table->date('date_agrement')->nullable();
            $table->dropColumn('logo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('informations', function (Blueprint $table) {
            $table->string('logo')->nullable();
            $table->dropColumn('logo_blanc');
            $table->dropColumn('logo_couleurs');
            $table->dropColumn('num_agrement');
            $table->dropColumn('date_agrement');
        });
    }
};
