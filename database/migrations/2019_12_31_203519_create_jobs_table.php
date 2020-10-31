<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('company_id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->text('requirements');
            $table->string('gender');
            $table->integer('category_id');
            $table->string('applicants')->nullable();
            $table->string('location');
            $table->string('level');
            $table->string('type');
            $table->integer('status');//if draft or no
            $table->date('lastdate');
            $table->string('industry');
            $table->string('experience');
            $table->string('salary');
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
        Schema::dropIfExists('jobs');
    }
}
