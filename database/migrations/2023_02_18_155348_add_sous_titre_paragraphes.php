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
        Schema::table('paragraphes', function (Blueprint $table) {
            $table->string('sous_titre')->nullable()->after('titre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paragraphes', function (Blueprint $table) {
            $table->dropColumn('sous_titre');
        });
    }
};
