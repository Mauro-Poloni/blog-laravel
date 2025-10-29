<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->text('comentary');
            $table->string('user');
            $table->integer('user_id');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
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
        Schema::dropIfExists('comentaries');
    }
}
