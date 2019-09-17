<?php

namespace App\Http\Controllers;

use App\User;
use App\UserFilters;

class UsersController extends Controller
{
    public function index(UserFilters $filters)
    {
        return User::filter($filters)->get();
    }
}
