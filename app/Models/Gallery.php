<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Manipulations;

class Gallery extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'location'
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CONTAIN, 256, 144);

        $this->addMediaConversion('large')
            ->fit(Manipulations::FIT_STRETCH, 1280, 720);
    }
}
