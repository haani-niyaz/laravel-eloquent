<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function($table) {
            $table->integer('publisher_id')->unsigned();
            $table->foreign('publisher_id')->references('id')->on('publishers');
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
            $table->dropForeign('books_publisher_id_foreign');
            $table->dropColumn('publisher_id');
        });
    }
}
