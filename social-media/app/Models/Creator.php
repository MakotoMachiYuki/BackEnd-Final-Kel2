<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
    ];

    //Connect Creator and Post (condition : many to many) in the Creator_posts
    public function post()
    {
        return $this->belongsToMany(Post::class, 'creator_posts', 'creator_id', 'post_id');
    }

    //Connect Creator and User (condition : oone to one) 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}