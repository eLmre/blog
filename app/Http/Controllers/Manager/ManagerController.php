<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;

class ManagerController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function manager() {
        return view('manager.index', [
            'articles' => Article::lastArticles(5),
            'categories' => Category::lastCategories(5),
            'categories_count' => Category::count(),
            'articles_count' => Article::count()
        ]);
    }
}
