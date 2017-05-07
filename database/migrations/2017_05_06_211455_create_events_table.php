<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create("events", function (Blueprint $table){
        $table->increments("id");
        $table->string("address");
        $table->string("city");
        $table->string("state");
        $table->string("zip");
        $table->dateTime("event_date");
        $table->integer("contact_id");
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("events");
    }
}
