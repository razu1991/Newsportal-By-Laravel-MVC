<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    //
    protected $table = "comments";
    protected $primaryKey = "comment_id";
    protected $fillable = [
        'comments_description',
        'news_id',
        'user_id',
    ];

    public function newses() {
        return $this->belongsTo('App\News', 'news_id');
    }

    public function users() {
        return $this->belongsTo('App\User', 'user_id');
    }

}
