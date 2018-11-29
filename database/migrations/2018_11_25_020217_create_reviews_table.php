<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->float('rating', '2');
            $table->text('comment')->nullable();
            $table->timestamps();
        });

        Schema::table('reviews', function(Blueprint $table){
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('reviews', function(Blueprint $table){
            $table->unsignedInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
