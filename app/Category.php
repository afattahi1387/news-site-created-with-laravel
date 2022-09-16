<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function news() {
        return $this->hasMany(News::class);
    }

    public function allow_for_delete() {
        if($this->hasMany(News::class)->count() < 1) {
            return true;
        }

        return false;
    }
}
