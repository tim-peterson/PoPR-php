<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('reviews', function (Blueprint $table) {

           // $table->increments('id')->unsigned();
            //$table->integer('organization_id')->unsigned();
           // $table->string('name');
            $table->longText('description');

            $table->tinyInteger('originality');
            $table->tinyInteger('rigor');
            $table->tinyInteger('impact');
            $table->boolean('accept')->defaults(false);
           // $table->string('url');
            //$table->timestamps();
            $table->softDeletes();


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
