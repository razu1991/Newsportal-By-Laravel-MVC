<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model {

    //
    protected $table = "category";
    protected $primaryKey = "id";
    protected $fillable = [
        'category_name',
    ];

    public function newses() {
        return $this->hasMany(News::CLASS, 'category_id');
    }

}
