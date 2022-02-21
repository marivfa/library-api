<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_log', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('book_id'); 
            $table->foreign('book_id')->references('id')->on('book')->onDelete('cascade');
            $table->string('name');
            $table->date('date_borrowed');
            $table->date('return_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_log');
    }
}
