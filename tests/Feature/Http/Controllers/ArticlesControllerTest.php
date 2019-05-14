<?php

namespace Tests\Feature\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Tests\TestCase;

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

        $this->user = User::inRandomOrder()->first();
    }

    public function testIndex(): void
    {
        $response = $this
            ->actingAs($this->user)
            ->get('/articles');
        $response->assertViewIs('articles.index');
        //        $response->assertSee($this->user->name);
        $response->assertSee('Сообщения от всех пользователей');
    }

    public function testShowMethod(): void
    {
        foreach (Article::inRandomOrder()->limit(2)->get() as $article) {
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

    public function testCreate(): void
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('articles.create'));
        //dd(get_class($response));
//        $response->assertSuccessful();
        $response->assertViewIs('articles.create');
    }

    public function testArticlesStore(): void
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

    public function testEdit(): void
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
    //        $response->assertViewIs('articles.edit');
    //        $response->assertRedirect('/articles');
    //    }
    /**
     *
     */
    public function testDelete(): void
    {
        Session::start();
        $this
            ->actingAs($this->user)
            ->post(route('articles.store'),
                [
                    'title'  => $title = Str::random(),
                    'body'   => $body = Str::random(),
                    '_token' => Session::token(),
                ])
            ->assertRedirect('/articles')
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

        $response = $this
            ->delete(route('articles.delete', [$article->id,
                '_token' => Session::token(),
            ]));

        $response->assertRedirect('/articles');
        // Clean up
        $article->delete();
    }
}
