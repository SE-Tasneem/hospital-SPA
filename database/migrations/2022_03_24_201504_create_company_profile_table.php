<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profile', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('en_name');
            $table->string('logo')->nullable();
            $table->text('message')->nullable();
            $table->text('en_message')->nullable();
            $table->text('goals')->nullable();
            $table->text('en_goals')->nullable();
            $table->text('vision')->nullable();
            $table->text('en_vision')->nullable();
            $table->string('address')->nullable();
            $table->string('en_address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_profile');
    }
}
