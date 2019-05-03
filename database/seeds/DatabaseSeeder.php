<?php

use App\Article;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, \random_int(1, 10))->create();
        factory(Article::class, \random_int(1, 10))->create();
    }
}
