<?php

namespace App\Http\Controllers;

use App\Article;
//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
       // $articles = Article::all();
        // return $articles;
        $articles = Article::all();
        return view('articles.index', compact('articles'));

        // return view('articles.index')->with('articles', $articles);
    }
}
