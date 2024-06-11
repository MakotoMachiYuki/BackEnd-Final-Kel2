<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedPost extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'creator_id',
        'post_id',
        'saved_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function creator()
    {
        return $this->belongsTo(Creator::class, 'creator_id');
    }
    
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}