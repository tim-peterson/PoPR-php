<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateV2UserTagTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('user_tag', function (Blueprint $table)  {
            $table->dropColumn('team_id');

        });  


        Schema::create('user_team_tag', function (Blueprint $table) {

          //$table->engine = 'InnoDB';

            $table->increments('id')->unsigned();

            $table->integer('user_id')->unsigned()->index();
            // $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');

            $table->integer('tag_id')->unsigned()->index();

            $table->integer('team_id')->unsigned()->index();

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
    }
}
