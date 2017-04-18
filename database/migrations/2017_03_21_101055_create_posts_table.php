<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('featured_image_id')->nullable();
            $table->string('title');
            $table->text('intro')->nullable();
            $table->text('content');
            $table->boolean('public');
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->unique('slug');
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
