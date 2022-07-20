<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToTeamUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('team_users', function (Blueprint $table)  {
            $table->longText('comment');

            $table->tinyInteger('significance');
            $table->tinyInteger('innovation');
            $table->tinyInteger('investigator');
            $table->tinyInteger('environment');
            $table->tinyInteger('approach');
            $table->tinyInteger('overall');
            $table->boolean('accept')->defaults(false);
           // $table->string('url');

            $table->timestamps();
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
