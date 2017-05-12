<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create("equipment_event", function (Blueprint $table){
        $table->integer("event_id")->unsigned();
        $table->integer("equipment_id")->unsigned();
        $table->foreign("event_id")->references("id")->on("events");
        $table->foreign("equipment_id")->references("id")->on("equipment");
        $table->primary(['event_id', 'equipment_id']);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("equipment_event");
    }
}
