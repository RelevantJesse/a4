<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    // Relationship
    public function equipment(){
      return $this->hasMany("App\Equipment");
    }
}
