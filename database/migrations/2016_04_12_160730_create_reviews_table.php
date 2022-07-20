<?php

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
            $table->integer('user_id')->index();
            $table->integer('team_id')->index();
            $table->string('name');
            $table->timestamps();

        });


        Schema::create('team_review', function (Blueprint $table) {
            $table->integer('team_id')->unsigned()->index();
            // $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');

            $table->integer('review_id')->unsigned()->index();
            // $table->foreign('industry_id')->references('id')->on('industries')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('user_review', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
            // $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');

            $table->integer('review_id')->unsigned()->index();
            // $table->foreign('industry_id')->references('id')->on('industries')->onDelete('cascade');

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
        Schema::drop('reviews');
    }
}
