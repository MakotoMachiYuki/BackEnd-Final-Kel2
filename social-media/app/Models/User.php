<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable 
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'firstName',
        'lastName',
        'email',
        'dateOfBirth',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function creator(){
        return $this->hasOne(Creator::class);
    }

    public function savedPost(){
        return $this->hasMany(Saved_post::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function followersCount()
{
    return $this->followers()->count();
}

public function followingsCount()
{
    return $this->following()->count();
}

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'follower_id');
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'following_id');
    }

    public function checkfollowers($userId)
    {
        return $this->followers()->where('follower_id', $userId)->exist();
    }  

    public function checkfollowing($userId)
    {
        return $this->following()->where('following_id', $userId)->exist();
    }

    public function checkSaved($post_id)
    {
        return $this->savedPost()->where('post_id', $post_id)->exists();
    }
    
    public function posts(){
        return $this->hasMany(Post::class);
    }
    
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
