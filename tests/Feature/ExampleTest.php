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
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testBasicTest1()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function testBasicTest2()
    {
        $response = $this->get('/register');

        $response->assertViewIs($value);
    }



//public function testBasicTest1()
//{
//    $this->visit('/')
//        ->click('Регистрация Главная')
//        ->seePageIs('/register');
//}
}
