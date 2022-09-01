<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());
        return new UserResource($user);
    }

    public function findEmail($word): AnonymousResourceCollection
    {
        $query = User::where('email', 'like', $word . '%')
            ->orWhere('email', 'like', '%' . $word . '%')
            ->get();
        return UserResource::collection($query);
    }

    public function findPostByUser($id): UserResource
    {
        return new UserResource(User::with('posts')->findOrFail($id));
    }

    public function store(UserRequest $request): UserResource
    {
        $created_user = User::create($request->validated());
        return new UserResource($created_user);
    }

    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }
}
