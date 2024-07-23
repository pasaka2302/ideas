<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Idea extends Model
{
    use HasFactory;

    // protected field for eager loading
    protected $with = ['user:id,email,name,image', 'comments.user:id,name,image'];

    protected $withCount  = ['likes'];

    protected $fillable = [
        'user_id',
        'content',
        ];

    // protected $guarded = [
    //     'id',
    //     'created_at',
    //     'updated_at'
    // ];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->belongsToMany(User::class, 'idea_like')->withTimestamps();
    }

    public function scopeSearch($query, $search = ''){
        $query->where('content', 'like', '%'. $search . '%');
    }
}
