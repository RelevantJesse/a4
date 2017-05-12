<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function equipment(){
      return $this->belongsToMany("App\Equipment");
    }
}
