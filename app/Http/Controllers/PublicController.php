<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use function foo\func;
use Illuminate\Http\Request;


class PublicController extends Controller
{
    protected $paginate = 3;

    public function index(Request $request)
    {
        $articles = Article::select();

        if($request->has('categories')) {
            $articles->whereHas('categories', function($q) use($request){
                $q->whereIn('id', $request->get('categories'));
            });
        }

        if($request->has('search')) {
            $articles->where(function($q) use($request) {
                $q->where('title', 'like', '%'. $request->get('search'). '%');
                $q->orWhere('description', 'like', '%'. $request->get('search'). '%');
            });
        }

        $articles->where('published', 1)->orderBy('created_at', 'desc');

        return view('index', [
            'articles' => $articles->paginate($this->paginate),
            'selected_categories' => $request->get('categories'),
            'search' => $request->get('search')
        ]);
    }

    public function category($slug) {
        $category = Category::where('slug', $slug)->firstOrFail();
        $articles = Article::select();
        $articles->whereHas('categories', function($q) use($category){
            $q->where('slug', $category->slug);
        });
        $articles->where('published', 1)->orderBy('created_at', 'desc');

        return view('category', [
            'category' => $category,
            'articles' => $articles->paginate($this->paginate)
        ]);
    }

    public function article($slug) {
        return view('article', [
            'article' => Article::where('slug', $slug)->firstOrFail()
        ]);
    }

}
