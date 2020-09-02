<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function cat(){
        return $this->belongsTo("App\Cat");
    }
}
