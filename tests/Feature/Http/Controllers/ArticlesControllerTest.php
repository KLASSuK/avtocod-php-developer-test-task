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
        $this->assertTrue(true);

    }



    public function testIndex1()
    {
        $user = User::findOrFail(1);
//
        $response = $this
            ->actingAs($user)//
            ->get('/articles');//

            $response->assertSee($user->name);
            $response->assertSee('№33');

//        dd($response->getContent());
//        $this->get(route('articles.index'));
        //view('articles.index');
//        $response->assertViewIs('articles');
//        $response->assertStatus(302);

    }
}

//$response = $this->get('/register');
//$this->get(route('articles.index'));
//view('mainpage');
//$response->assertStatus(200);
