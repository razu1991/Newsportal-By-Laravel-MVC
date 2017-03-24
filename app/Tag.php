<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    //
    protected $table = "tags";
    protected $fillable = [
        'tags_name',
    ];

    public function tagnews() {
        return $this->hasMany(News::CLASS, 'tag_id');
    }

}
