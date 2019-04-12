<?php

namespace App\Http\Middleware;

use App\Article;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckOwnerForEditArticle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = $request->route('id');
        if (Article::find($id)->id_owner !== Auth::user()->id) {
            return redirect('/articles/');
        }
        return $next($request);
    }
}
