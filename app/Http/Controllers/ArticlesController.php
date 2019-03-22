<?php

namespace App\Http\Controllers;

use App\Article;
use Carbon\Carbon;
use Illuminate\Support;
//use App\Http\Controllers\Controller;
use Request;

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
        //compact dont fucking use! bad practick
    }


    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {
        $input = Request::all();
        $input['published_at'] = Carbon::now();

        Article::create($input);

        return redirect('articles');
    }
}