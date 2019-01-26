<?php

namespace App;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'slug', 'description', 'published'];

    public function scopeLastArticles($query, $count)
    {
      return $query->orderBy('created_at', 'desc')->take($count)->get();
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'article_category');
    }
}
