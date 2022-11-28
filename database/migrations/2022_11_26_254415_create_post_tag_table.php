<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('tag_id');
//            $table->index('post_id', 'posts_tagx_post_idx');
//            $table->index('tag_id', 'posts_tag_tag_idx');
//            $table->foreign('post_id', 'posts_tag_post_fk')->on('posts')->references('id');
//            $table->foreign('tag_id', 'posts_tag_tag_fk')->on('tags')->references('id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
};
