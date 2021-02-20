<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("post_id");
            $table->string("slug");
            $table->string("status", 7);
            $table->integer('visits')->default(0);

            // relazione con il Database
            $table->foreign('post_id')
             ->references('id')
             ->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_infos');
    }
}
