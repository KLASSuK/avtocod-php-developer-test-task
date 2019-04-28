<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticlesControllerTest extends TestCase

{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testIndex()
    {
        $user     = User::findOrFail(1);
        $response = $this
            ->actingAs($user)//
            ->get('/articles');//
        $response->assertViewIs('articles.index');
        $response->assertSee($user->name);
        $response->assertSee('№33');

        //        dd($response->getContent());
        //        $this->get(route('articles.index'));
        //view('articles.index');
        //        $response->assertViewIs('articles');
        //        $response->assertStatus(302);

    }

    public function testShow()
    {
        $user     = User::findOrFail(1);
        $response = $this
            ->actingAs($user)//
            ->get('/articles/1');//
        $response->assertViewIs('articles.show');
        $response->assertSee('№1');
    }

    public function testCreate()
    {
        $user     = User::findOrFail(1);
        $response = $this
            ->actingAs($user)//
            ->get('/articles/create');//
        $response->assertViewIs('articles.create');
    }

    public function testStore()
    {
        $user     = User::findOrFail(1);
        $response = $this
            ->actingAs($user)//
            ->get('/articles/create');//
        //        $request Do IT

        $response->assertViewIs('articles.create');
        $response->assertRedirect('/articles');
    }

    public function testEdit()
    {
        $user     = User::findOrFail(1);
        $response = $this
            ->actingAs($user)//
            ->get('/articles/1/edit');//
        //        $request Do IT

        $response->assertViewIs('articles.edit');
    }

    public function testUpdate()
    {
        $user     = User::findOrFail(1);
        $response = $this
            ->actingAs($user)//
            ->post('/articles/1/edit');//
        //        $request Do IT

        $response->assertViewIs('articles.edit');
        $response->assertRedirect('/articles');
    }

    public function testDelete()
    {
        $user     = User::findOrFail(1);
        $response = $this
            ->actingAs($user)//
            ->post('/articles/1/delete');//
        //        $request Do IT

        $response->assertRedirect('/articles');
    }
}
//$response = $this->get('/register');
//$this->get(route('articles.index'));
//view('mainpage');
//$response->assertStatus(200);
