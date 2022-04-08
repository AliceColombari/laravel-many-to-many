<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // creo vincoli relazionali tra le tabelle
            $table->unsignedBigInteger('category_id')->nullable()->after('slug');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         // migrazione per down scrivo - lancio migrate:rollback - rilancio una migrate
        Schema::table('posts', function (Blueprint $table) {
            // nome vincolo integrita all'interno del db da parte di laravel
           $table->dropForeign('posts_category_id_foreign');
           $table->dropColumn('category_id');
        });
    }
}
