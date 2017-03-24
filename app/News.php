<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

    //
    protected $table = "news";
    //  protected $primaryKey = "p_id";

    protected $fillable = [
        'News_title',
        'category_id',
        'tag_id',
        'News_summery',
        'full_News',
        'author_name',
        'news_image',
        'publication_status',
        'breaking_News',
        'featured_News',
    ];

    public function categorys() {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function comments() {
        return $this->hasMany('App\Comment', 'news_id');
    }

}
