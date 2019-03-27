<?php

namespace App\Http\Controllers;

use App\Article;
use Carbon\Carbon;
use Illuminate\Support;
use \Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;

//use App\Http\Controllers\Controller;
//use App\Http\Middleware\Authenticate;

class ArticlesController extends Controller
{
    public function index()
    {
        // return $articles;
        // have a variant with $data =Workers::all()->sortBy('name');
        $articles = Article::orderBy('published_at', 'DESC')->get();
        //return view('articles.index', compact('articles'));
        return view('articles.index')->with('articles', $articles);
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    { //$input = Request::all();
        $input = request()->all();
        $input['username'] = Auth::user()->name;
        Article::create($input);
        return redirect('articles');
    }
}
