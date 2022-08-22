<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(): string
    {
        return 'hello';
    }

    public function update(Request $req)
    {

    }


}
