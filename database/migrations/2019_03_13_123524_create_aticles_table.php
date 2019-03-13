<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aticles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('text');
            $table->timestamp('published_at')->default(now());
            $table->text('gravatar')->default('https://www.gravatar.com/avatar/00000000000000000000000000000000');
            $table->timestamp();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aticles');
    }
}
