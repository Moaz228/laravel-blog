<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasUuids;
    protected $primaryKey = "id";
    protected $keyType = "string";
    public $incrementing = "false";
    protected $table = 'posts';
    protected $fillable = ['title', 'body', 'published', 'author'];

    protected $guarded = ['id'];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
