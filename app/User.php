<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public static function findByUsername($username)
    {
        return self::whereUsername($username)->first();
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followed_id');
    }

    public static function followers()
    {
        $user = Auth::user();
        $followers = $user->follows()->pluck('follower_id');

        return self::whereIn('id', $followers)->get();
    }

    public static function following()
    {
        $user = Auth::user();
        $following = $user->follows()->pluck('followed_id');

        return self::whereIn('id', $following)->get();
    }
}
