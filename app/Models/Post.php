<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Laravel\Scout\Searchable;

class Post extends Model implements HasMedia, Viewable
{
    use HasFactory, HasSlug, InteractsWithMedia, InteractsWithViews, Searchable;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'featured',
        'hidden'
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('preview')
            ->fit(Manipulations::FIT_STRETCH, 256, 144);

        $this->addMediaConversion('large')
            ->fit(Manipulations::FIT_STRETCH, 1280, 720);
    }

    public function toSearchableArray(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function updates()
    {
        return $this->hasMany(Update::class);
    }

    public function latestUpdate()
    {
        return $this->hasOne(Update::class)->latest();
    }

    public function userOfLatestUpdate()
    {
        return $this->hasOneThrough(User::class, Update::class)
            ->latest('updates.updated_at');
    }
}
