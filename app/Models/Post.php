<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
  use HasFactory;

  protected $guarded = ['id', 'created_at', 'updated_at'];

  // Relation one to many inverse
  public function user() {
    return $this->belongsTo(User::class);
  }

  public function category() {
    return $this->belongsTo(Category::class);
  }

  // Relation many to many
  public function tags() {
    return $this->belongsToMany(Tag::class);
  }

  // Relation one to one poly
  public function image() {
    return $this->morphOne(Image::class, 'imageable');
  }
}