<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAboutColumnToCompanyProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_profile', function (Blueprint $table) {
            $table->text('about');
            $table->text('en_about');
            $table->text('values');
            $table->text('en_values');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_profile', function (Blueprint $table) {
            $table->dropColumn('about');
            $table->dropColumn('en_about');
            $table->dropColumn('values');
            $table->dropColumn('en_values');
        });
    }
}
