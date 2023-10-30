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
        

            $table->string('prenom');

            $table->dropColumn('details');
            
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
        Schema::table('inscriptions', function (Blueprint $table) {
            $table->text('details',16383)->default('Nouvelle-inscription');
            $table->dropColumn('prenom');
            $table->dropColumn('email');
            $table->dropColumn('profession');
            $table->dropColumn('session');
        });
    }
};
