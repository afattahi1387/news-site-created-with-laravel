<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'image', 'category_id', 'short_description', 'long_description'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
