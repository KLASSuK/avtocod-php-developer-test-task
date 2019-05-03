<?php

namespace Tests\Feature\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticlesControllerTest extends TestCase
{
    use DatabaseTransactions;

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

        $this->user = User::findOrFail(1);
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
        $this
            ->actingAs($this->user)
            ->post(route('articles.store'), [
                'title' => $title = Str::random(),
                'body' => $body = Str::random(),
            ])
            ->assertRedirect(route('articles.index'))
            ->assertSessionHas('success');

        /** @var Collection|Article[] $articles */
        $articles = Article::where([
            'id_owner' => $this->user->id,
            'title' => $title,
            'body' => $body,
        ])->get();

        $this->assertCount(1, $articles);
        $this->assertDatabaseHas('articles', [
            'id_owner' => $this->user->id,
            'title' => $title,
            'body' => $body,
        ]);

        // Clean up
        foreach ($articles as $article) {
            $article->delete();
        }
    }

//    public function testStore()
//    {
//        $user     = User::findOrFail(1);
//        $response = $this
//            ->actingAs($user)//
//            ->get('/articles/create');//
//            $response->assertViewIs('articles/create');
//        $response =$this
//            ->actingAs($user)//
//            ->post('articles/')
//
//        Article::create($input);
//
////        Article::findorfail(1);
//$response->assertSee('Заголовок Статьи');
//    }
//
//    public function testEdit()
//    {
//        $user     = User::findOrFail(1);
//        $response = $this
//            ->actingAs($user)//
//            ->get('/articles/1/edit');//
//        //        $request Do IT
//
//        $response->assertViewIs('articles.edit');
//    }
//
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
