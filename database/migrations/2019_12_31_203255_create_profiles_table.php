<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('email');
            $table->string('name');
            $table->string('title');
            $table->string('gender');
            $table->string('phone');
            $table->string('status');
            $table->string('education');
            $table->string('about');
            $table->string('state');
            $table->string('country');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('linkedin');
            $table->string('twitter');
            $table->string('website');
            $table->string('resume');
            $table->string('avatar');
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
        Schema::dropIfExists('profiles');
    }
}
