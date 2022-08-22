<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('post_title');
            $table->string('post_tagline')->nullable();
            $table->text('post_description');
            $table->text('post_content');
            $table->text('post_tag')->nullable();
            $table->string('post_image')->nullable();
            $table->string('posts_author');
            $table->string('slug_url')->unique();
            $table->string('post_type')->nullable();
            $table->date('published_date')->nullable();
            $table->tinyInteger('publish')->default(0)->comment('0=inacktive 1=Aktive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
