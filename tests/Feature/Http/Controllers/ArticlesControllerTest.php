<?php

namespace Tests\Feature\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\This;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticlesControllerTest extends TestCase
{
    //    use DatabaseTransactions;
    /**
     * @var User
     */
    protected $user;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::inRandomOrder()->first();
    }

    public function testIndex()
    {
        $response = $this
            ->actingAs($this->user)
            ->get('/articles');
        $response->assertViewIs('articles.index');
        $response->assertSee($this->user->name);
        $response->assertSee('№1');
    }

    public function testShow()
    {
        foreach (Article::all() as $article) {
            /** @var Article $article */
            $response = $this
                ->actingAs($this->user)
                ->get(route('articles.show', ['id' => $article->id]));
            //dd($response);
            $response->assertViewIs('articles.show');
            $response->assertSee('Заголовок Статьи');
            $response->assertSee($article->title);
            $response->assertSee($article->body);
        }
    }

    public function testCreate()
    {
        $response = $this
            ->actingAs($this->user)
            ->get('/articles/create');

        $response->assertViewIs('articles.create');
    }

    public function testArticlesStore()
    {
        Session::start();
        $this
            ->actingAs($this->user)
            ->post(route('articles.store'), [
                'title'  => $title = Str::random(),
                'body'   => $body = Str::random(),
                '_token' => Session::token(),
            ])
            ->assertRedirect(route('articles.index'))
            ->assertSessionHas('success');
        /** @var Collection|Article[] $articles */
        $articles = Article::where([
            'id_owner' => $this->user->id,
            'title'    => $title,
            'body'     => $body,
        ])->get();

        $this->assertCount(1, $articles);
        $this->assertDatabaseHas('articles', [
            'id_owner' => $this->user->id,
            'title'    => $title,
            'body'     => $body,
        ]);

        // Clean up
        foreach ($articles as $article) {
            $article->delete();
        }
    }

    public function testEdit()
    {

        Session::start();
        $this
            ->actingAs($this->user)
            ->post(route('articles.store'), [
                'title'  => $title = Str::random(),
                'body'   => $body = Str::random(),
                '_token' => Session::token(),
            ])
            ->assertRedirect(route('articles.index'))
            ->assertSessionHas('success');
        /** @var Collection|Article[] $article */
        $article = Article::where([
            'id_owner' => $this->user->id,
            'title'    => $title,
            'body'     => $body,
        ])->first();
        $this->assertDatabaseHas('articles', [
            'id_owner' => $this->user->id,
            'title'    => $title,
            'body'     => $body,
        ]);
        //dd($article->id);
        $response = $this
            ->get(route('articles.edit', [$article->id]));
        $response->assertViewIs('articles.edit');
        foreach ([$title, $body] as $value) {
            $response->assertSeeText($value);
        }
        // Clean up
        $article->delete();
    }

    //    public function testUpdate()
    //    {
    //        $user     = User::findOrFail(1);
    //        $response = $this
    //            ->actingAs($user)//
    //            ->post('/articles/1/edit');//
    //        //        $request Do IT
    //
    //        $response->assertViewIs('articles.edit');
    //        $response->assertRedirect('/articles');
    //    }
    //
    //    public function testDelete()
    //    {
    //        $user     = User::findOrFail(1);
    //        $response = $this
    //            ->actingAs($user)//
    //            ->post('/articles/1/delete');//
    //        //        $request Do IT
    //
    //        $response->assertRedirect('/articles');
    //    }
}
//$response = $this->get('/register');
//$this->get(route('articles.index'));
//view('mainpage');
//$response->assertStatus(200);
