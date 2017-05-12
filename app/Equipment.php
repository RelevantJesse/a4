<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    // Relationship
    public function type() {
      return $this->belongsTo("App\Type");
    }

    public function events() {
      return $this->belongsToMany("App\Event");
    }
}
