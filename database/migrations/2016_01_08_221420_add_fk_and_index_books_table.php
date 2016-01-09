<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkAndIndexBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function($table) {
            $table->index('title');
            $table->integer('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('authors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function($table) {
            /**
            * Convention
            * <table>_<column>_<type>
            */
            
            $table->dropIndex('books_title_index');
            $table->dropForeign('books_author_id_foreign');

            // After removing relationship drop author_id
            $table->dropColumn('author_id');
        });
    }
}
