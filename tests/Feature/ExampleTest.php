<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/articles');

        $response->assertStatus(200);
    }

    public function testBasicTest1()
    {
        $response = $this->get('/register');
//        $this->get(route('articles.index'));
//        view('articles.index');
        $response->assertStatus(200);
    }

//    public function testBasicTest2()
//    {
//        $response = $this->get('/register2');
//
//        $response->assertViewIs($value);
//    }


//public function testBasicTest1()
//{
//    $this->visit('/')
//        ->click('Регистрация Главная')
//        ->seePageIs('/register');
//}
}
