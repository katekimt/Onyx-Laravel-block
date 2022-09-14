<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Events\UserStored;

class UserController extends Controller
{
    public function index()
    {
        return User::GetUser();
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());
        return new UserResource($user);
    }

    public function findEmail($word)
    {
        return UserResource::collection(User::FindEmail($word));
    }

    public function findPostByUser($id): UserResource
    {
        return new UserResource(User::FindPostByUser($id));
    }

    public function store(UserRequest $request)
    {

        $created_user = User::create(
            [
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]
        );
        event(new UserStored($created_user));
        return new UserResource($created_user);

    }

    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }
}
