<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateArticleRequest;

/**
 * Class ArticlesController.
 *
 * Контроллер статей.
 */
class ArticlesController extends Controller
{
    /**
     * reg_success_page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reg_success()
    {
        return view('auth.reg_success');
    }

    /**
     * Main page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'DESC')->get();

        return view('articles.index')->with('articles', $articles);
    }

    /**
     * Show custom article
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.show', ['article' => $article]);
    }

    /**
     * Create article
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Save a new article.
     *
     * @param CreateArticleRequest $request
     *
     * @return Response
     */
    public function store(CreateArticleRequest $request)
    {
        $input             = $request->all();
        $input['id_owner'] = Auth::guard()->user()->id;

        Article::create($input);

        return redirect('articles')
            ->with('success', 'Article successfully created!');
    }

    /**
     * Edit old article.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $articles = Article::findOrFail($id);

        return view('articles.edit', [
            'articles' => $articles,
            'id'       => $id,
        ]);
    }

    /**
     * Update old article.
     *
     * @param         $id
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $articles = Article::findOrFail($id);
        $articles->update($request->all());

        return redirect('articles');
    }

    /**
     * Delete article
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $articles = Article::findOrFail($id);
        $articles->delete();

        //        return redirect()->back()->withErrors('Successfully deleted!');
        return redirect('/articles');
    }
}
