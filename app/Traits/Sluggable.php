<?php

namespace App\Traits;

trait Sluggable {

    public static function bootSluggable()
    {
        static::saving(function ($model) {
            $model->slug = $model->generateSlug($model);
        });
    }

    public function generateSlug($model)
    {
        $slug = str_slug($model->title);
        // Look for exisiting slugs
        $existingSlugs = $model::whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'");
        // If no matching slugs were found, return early
        if ($existingSlugs->count() === 0) {
            return $slug;
        }
        // Get slugs in reversed order, and pick the first
        $lastSlugNumber = intval(str_replace($slug . '-', '', $existingSlugs->orderBy('slug', 'desc')->first()->slug));

        return $slug . '-' . ($lastSlugNumber + 1);
    }

}