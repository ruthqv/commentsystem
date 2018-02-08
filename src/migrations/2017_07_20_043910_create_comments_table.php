<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatecommentsTable extends Migration
{
    public function up()
    {

        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->default(0);
            
            $table->string('name', 100)->index('comments_name');
            $table->string('email', 50);
          
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');
            
            $table->morphs('commentstable',255); //la clave de todo

            $table->text('comment');
            $table->boolean('approved')->default(0);

            $table->integer('rating')->nullable()->index('comments_rating');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }

}
