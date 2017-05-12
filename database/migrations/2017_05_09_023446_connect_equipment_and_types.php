<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectEquipmentAndTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("equipment", function(Blueprint $table){
          $table->integer("type_id")->unsigned();
          $table->foreign("type_id")->references("id")->on("types");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table("equipment", function(Blueprint $table){
        $table->dropForeign("equipment_type_id_foreign");
        $table->dropColumn("type_id");
      });
    }
}
