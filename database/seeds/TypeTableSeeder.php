<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypeTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    Type::insert([
      "name" => "Cable"
    ]);

    Type::insert([
      "name" => "Microphone"
    ]);

    Type::insert([
      "name" => "Monitor"
    ]);

    Type::insert([
      "name" => "Projector"
    ]);
    
    Type::insert([
      "name" => "Speaker"
    ]);
  }
}
