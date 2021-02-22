<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

  protected $fillable = [
    "image",
    "title",
    "author",
    "text"
  ];

  public function infoPost() {
    return $this->hasOne("App\PostInfo");
  }

  public function comments() {
    return $this->hasMany("App\Comment");
  }

  public function tags() {
    return $this->belongsToMany("App\Tag");
  }

}
