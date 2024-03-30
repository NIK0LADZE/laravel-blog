<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $casts = [
        'published_at' => 'datetime'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'user_id',
        'category_id',
        'published_at',
    ];

    protected $with = ['category', 'author'];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($post) {
            if (!$post->user_id && auth()->check()) {
                $post->user_id = auth()->id();
            }
        });
    }

    public function scopeSearch($query, $searchString, $titleOnly = false)
    {
        $query->when(
            $searchString,
            fn ($query, $searchString) => $query
                ->when(
                    $titleOnly,
                    fn ($query) => $query->where('title', 'like', "%$searchString%"),
                    fn ($query) => $query
                            ->where(fn ($query) =>
                            $query->where('title', 'like', "%$searchString%")
                                ->orWhere("excerpt", "like", "%$searchString%")
                                ->orWhere("body", "like", "%$searchString%"))
                )
        );
    }

    public function registerMediaCollections(): void
    {
        $mimes = [
            'jpg' => 'image/jpg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
        ];
        $this->addMediaCollection('post_images')->acceptsMimeTypes($mimes)->singleFile();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
