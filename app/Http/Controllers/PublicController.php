<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use function foo\func;
use Illuminate\Http\Request;


class PublicController extends Controller
{
    protected $paginate = 3;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $filter = [];

        if($request->has('categories')) {
            if(is_array($request->get('categories'))) {
                $filter['categories'] = $request->get('categories');
            } else {
                $filter['categories'][] = $request->get('categories');
            }
        }

        if($request->has('search') && is_string($request->get('search'))) {
            $filter['search'] = $request->get('search');
        }

        return view('index', [
            'articles' => Article::filter($filter)->orderBy('created_at', 'desc')->paginate($this->paginate),
            'filter' => $filter,
        ]);
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function article($slug) {
        return view('article', [
            'article' => Article::where('slug', $slug)->firstOrFail()
        ]);
    }

}
