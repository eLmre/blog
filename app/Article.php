<?php

namespace App;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'slug', 'description', 'published'];

    /**
     * @param $filter
     * @return mixed
     */
    public static function filter($filter) {
        $articles = Article::select();

        if(isset($filter['categories'])) {
            $articles->whereHas('categories', function($q) use($filter){
                $q->whereIn('id', $filter['categories']);
            });
        }

        if(isset($filter['search'])) {
            $articles->where(function($q) use($filter) {
                $q->where('title', 'like', '%'. $filter['search']. '%');
                $q->orWhere('description', 'like', '%'. $filter['search']. '%');
            });
        }

        $articles->where('published', 1);

        return $articles;
    }

    /**
     * @param $query
     * @param $count
     * @return mixed
     */
    public function scopeLastArticles($query, $count)
    {
      return $query->orderBy('created_at', 'desc')->take($count)->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'article_category');
    }
}
