<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("equipment", function (Blueprint $table){
          $table->increments("id");
          $table->string("model");
          $table->string("serial");
          $table->integer("type");
          $table->dateTime("checked_out")->nullable();
          $table->integer("checked_out_by")->nullable();
          $table->dateTime("checked_in")->nullable();
          $table->integer("checked_in_by")->nullable();
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
        Schema::drop("equipment");
    }
}
