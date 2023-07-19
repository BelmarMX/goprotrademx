<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'insertion_code', 'type', 'title', 'slug', 'summary'
    ];

    public function elements(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this -> hasMany(GalleryElements::class);
    }
}
