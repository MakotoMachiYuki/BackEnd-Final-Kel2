<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Authenticatable
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'follower_id',
        'following_id',

    ];

    public function follower()
    {
        return $this-> belongsTo(user::class,'follower_id');
    }

    public function following()
    {
        return $this-> belongsTo(user::class,'following_id');
    }


}
