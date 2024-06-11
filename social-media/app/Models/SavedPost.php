<?php

namespace App\Models;

use Carbon\Traits\Creator;
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

    public function users(){
        return $this->hasMany(User::class);
    }

    public function creators(){
        return $this->belongsTo(Creator::class);
    }

    public function posts(){
        return $this->belongsTo(Post::class);
    }
}