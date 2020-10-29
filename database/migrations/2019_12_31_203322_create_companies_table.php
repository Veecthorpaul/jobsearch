<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('cname');
            $table->string('email');
            $table->string('specialization');
            $table->string('slug');
            $table->string('since');
            $table->string('phone');
            $table->string('website');
            $table->string('team');
            $table->string('search');
            $table->string('avatar');
            $table->text('description');
            $table->string('state');
            $table->string('city');
            $table->string('country');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('linkedin');
            $table->string('twitter');
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
        Schema::dropIfExists('companies');
    }
}
