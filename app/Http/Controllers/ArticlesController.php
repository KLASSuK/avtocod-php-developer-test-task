<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Support;
//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        // return $articles;
        $articles = Article::all();
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

}