<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $timestamps = false;

  public function posts() {
    return $this->belongsToMany("App\Post");
  }

}
