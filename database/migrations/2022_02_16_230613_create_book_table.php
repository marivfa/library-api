<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id'); 
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
            $table->string('title',100);
            $table->string('author',100);
            $table->date('date_publication');
            $table->enum('status',['active','inactive'])->default('active');
            $table->string('code',50);
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
        Schema::dropIfExists('book');
    }
}
