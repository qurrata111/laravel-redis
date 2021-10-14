<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignIdInBookAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book_authors', function (Blueprint $table) {
            $table->foreignId('book_id')->constrained();
            $table->foreignId('author_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_authors', function (Blueprint $table) {
            $table->dropColumn('book_id');
            $table->dropColumn('author_id');
        });
    }
}
