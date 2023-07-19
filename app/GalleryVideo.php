<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryVideo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'gallery_id', 'title', 'description', 'thumbnail', 'insertion_code', 'full_script'
    ];
}
