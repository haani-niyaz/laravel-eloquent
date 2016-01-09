<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_tags', function($table) {
            $table->increments('id');
            $table->integer('book_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('tag_id')->references('id')->on('tags');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books_tags', function($table) {
            $table->dropForeign('books_tags_book_id_foreign');
            $table->dropForeign('books_tags_book_id_foreign');
        });

        Schema::drop('books_tags');
    }
}
