<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Idea;
use App\Models\User;
use App\Models\Comment;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'bio',
        'image',
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function ideas(){
        return $this->hasMany(Idea::class)->latest();
    }

    public function comments(){
        return $this->hasMany(Comment::class)->latest();
    }

    public function followings(){
        return $this->belongsToMany(User::class, 'follower_user', 'follower_id', 'user_id')->withTimestamps();
    }

    public function followers(){
        return $this->belongsToMany(User::class, 'follower_user', 'user_id', 'follower_id')->withTimestamps();
    }

    public function follows(User $user){
        return $this->followings()->where('user_id', $user->id)->exists();
    }

    public function likes(){
        return $this->belongsToMany(Idea::class, 'idea_like')->withTimestamps();
    }

    public function likesIdea(Idea $idea){
        return $this->likes()->where('idea_id', $idea->id)->exists();
    }

    public function getImageUrl(){
        if($this->image){
            return url('storage/'.$this->image);
        }

        return "https://api.dicebear.com/6.x/fun-emoji/svg?{{$this->name}}";
    }

}
