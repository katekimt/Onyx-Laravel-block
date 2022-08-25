<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;


class UserController extends Controller
{
    public function index(): string
    {
        return User::all();
    }

    public function update(Request $req)
    {

    }

    public function findEmail(): AnonymousResourceCollection
    {
        $words = 'ka';
        $query = UserResource::collection(User::where('email', 'like', $words.'%')
            ->orWhere('email', 'like', '%'.$words.'%')
            ->get());
        return $query;
    }

    public function findPostByUser($id): UserResource
    {
        return new UserResource(User::with('posts')->findOrFail($id));
    }


}
