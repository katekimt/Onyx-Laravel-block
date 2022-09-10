<?php

namespace App\Models;

use App\Http\Resources\PostResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $guarded = [];

    protected $fillable = ['title', 'keywords', 'text', 'file'];


    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function scopeGetPosts(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return PostResource::collection(Post::all());
    }

    public function scopeShow($query, $id)
    {
        return  $query->findOrFail($id);
    }

    public function scopeFindPost($query, $keywords){
       return $query->where('title', 'like', '%' . $keywords . '%')
            ->orWhere('text', 'like', '%' . $keywords . '%')
            ->limit(2)
            ->get();
    }
}
