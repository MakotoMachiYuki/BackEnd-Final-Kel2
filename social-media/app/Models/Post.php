<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'image',
        'title',
        'text',
        'likes_count',
    ];


    public function creator()
    {
        return $this->belongsToMany(Creator::class, 'creator_posts', 'post_id', 'creator_id');
    }

    public function savedPost()
    {
        return $this->hasMany(Saved_post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
