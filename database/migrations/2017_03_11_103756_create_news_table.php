<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();           
            $table->string('news_title');
            $table->text('news_summery');
            $table->longText('full_news');
            $table->string('author_name');
            $table->string('news_image');
            $table->tinyinteger('publication_status');
            $table->tinyinteger('breaking_news');
            $table->tinyinteger('featured_news');
            $table->integer('hit_count');
            $table->timestamp('news_post_date_time');
            $table->timestamps();
            $table->foreign('category_id')
                    ->references('id')                    
                    ->on('category')
                    ->onDelete('cascade')
                    ->dropForeign(['category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
