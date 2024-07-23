<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index(){

        $users = User::latest()->paginate(5);

        return view('admin.users.index', compact('users'));

    }
}
