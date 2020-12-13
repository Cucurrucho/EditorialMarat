<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file');
            $table->bigInteger('blog_post_id')->unsigned();
            $table->timestamps();

            $table->foreign('blog_post_id')
                ->references('id')->on('blog_posts')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_photos');
    }
}
