<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getImgAttribute()
    {
        if($this->attributes['img'] == null)
            return null;
        return 'https://storage.googleapis.com/laravel-dev/' . $this->attributes['img'];
    }
}
