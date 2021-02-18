<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

  public function infoPost() {
    return $this->hasOne("App\PostInfo");
  }

  public function comments() {
    return $this->hasMany("App\Comment");
  }
}
