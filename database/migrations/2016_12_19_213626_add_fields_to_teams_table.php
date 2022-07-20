<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('teams', function (Blueprint $table) {

           // $table->increments('id')->unsigned();
            //$table->integer('organization_id')->unsigned();
           // $table->string('name');
            $table->longText('description');
            $table->longText('description_lay');
            $table->enum('type', ['manuscript', 'review']);
            $table->boolean('featured')->defaults(false);
            $table->string('keywords');
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
