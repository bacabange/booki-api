<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('author')->nullable();
            $table->integer('pages');
            $table->integer('year');
            $table->string('editorial')->nullable();
            $table->timestamps();
        });

        Schema::create('book_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('book_id')->unsigned();
            $table->date('started_in');
            $table->date('finished_in')->nullable();
            $table->string('state')->default('in_progress');
            $table->text('description')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_users');
        Schema::dropIfExists('books');
    }
}
