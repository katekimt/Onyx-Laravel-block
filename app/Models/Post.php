<?php

namespace App\Models;

use App\Http\Resources\PostResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\PostRequest;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $guarded = [];

    protected $fillable = ['title', 'keywords', 'text', 'file', 'user_id'];


    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function scopeGetPosts($query): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return PostResource::collection(Post::all());
    }

    public function scopeShow($query, int $id)
    {
        return  $query->findOrFail($id);
    }

    public function scopeFindPost($query, string $keywords){
       return $query->where('title', 'like', '%' . $keywords . '%')
            ->orWhere('text', 'like', '%' . $keywords . '%')
            ->limit(2)
            ->get();
    }

    public function scopeStore($query, $request){

       return $query->create($request->validated());
    }
}
