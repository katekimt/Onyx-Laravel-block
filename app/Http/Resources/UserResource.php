<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PostResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'email' => $this->email,
            'total_posts' => $this->total_posts,
            'full_name' => $this->full_name,
            'last_name' => $this->last_name,
            'posts'=> PostResource::collection($this->posts),
        ];
    }
}
