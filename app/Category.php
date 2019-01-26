<?php

namespace App;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'slug', 'published'];

    public function scopeLastCategories($query, $count)
    {
      return $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}
