<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            // colonna per inserire riferimento al post con vincolo di chiave esterna per i post
            $table->unsignedBigInteger('post_id');
            // onDelete('cascade') -> elimina tutto ciò che c'è di correlato
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

            // riferimento tag
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

            // 1 index (indice) su due campi (post e tag)
            $table->index(['post_id', 'tag_id']);
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
}
