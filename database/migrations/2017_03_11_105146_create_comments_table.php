<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('comment_id');
            $table->longtext('comments_description');
            $table->integer('news_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->tinyinteger('publication_status');
            $table->tinyinteger('deletion_status');
            $table->timestamp('comment_post_date_time');
            $table->timestamps();
            $table->foreign('news_id')
                    ->references('id')                   
                    ->on('news')
                     ->onDelete('cascade')
                    ->dropForeign(['news_id']);
            $table->foreign('user_id')
                    ->references('id')                    
                    ->on('users')
                    ->onDelete('cascade')
                    ->dropForeign(['user_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
