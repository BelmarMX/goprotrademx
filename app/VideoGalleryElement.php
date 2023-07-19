<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VideoGalleryElement extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'video_gallery_id', 'type', 'title', 'description', 'image', 'thumbnail', 'url', 'insertion_code', 'full_script'
    ];
}
