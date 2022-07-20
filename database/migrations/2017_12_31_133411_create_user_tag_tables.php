<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTagTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('tags', function (Blueprint $table) {

          //$table->engine = 'InnoDB';

            $table->increments('id')->unsigned();

            // $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
            $table->string('name');

            // $table->foreign('industry_id')->references('id')->on('industries')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('user_tag', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
            // $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');

            $table->integer('tag_id')->unsigned()->index();
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
        //
        Schema::dropIfExists('tags');
        Schema::dropIfExists('user_tag');
    }
}
