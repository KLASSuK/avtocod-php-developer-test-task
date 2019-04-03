<?php

use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('body')->nullable();
            $table->string('id_owner');
            $table->string('gravatar')->default('none');
            $table->timestamps();
            $table->timestamp('published_at')->useCurrent();
            //$table->timestamp('published_at')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
//Schema::table('articles', function (Blueprint $table) {
////            This shits don`t working with sqlite
//    $table->dropColumn('username');
