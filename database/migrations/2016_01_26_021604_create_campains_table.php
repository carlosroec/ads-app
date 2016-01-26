<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campains', function (Blueprint $table) {
          $table->increments('id');
          $table->date('start_at');
          $table->date('end_at');
          $table->string('description');
          $table->float('cost');
          $table->float('gain');
          $table->string('target');
          $table->timestamps();

          /*User related*/
          $table->integer('company_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campains');
    }
}
