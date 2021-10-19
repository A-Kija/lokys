<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id(); //id: int(11) => unsignedBigInteger
            $table->string('title', 255); //title: varchar(255)
            $table->string('isbn', 20); //isbn: varchar(20)
            $table->unsignedTinyInteger('pages'); //pages: tinyint(4) unsigned
            $table->text('about'); //about: text
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('authors');
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
        Schema::dropIfExists('books');
    }
}
