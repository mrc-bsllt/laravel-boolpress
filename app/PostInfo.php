<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostInfo extends Model
{

  protected $fillable = [
    "post_id",
    "slug",
    "status",
    "visits"
  ];

  public $timestamps = false;

  public function post() {
    return $this->belongsTo("App\Post");
  }
}
