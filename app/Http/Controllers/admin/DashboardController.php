<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index(){

          // if(Gate::denies('admin')){
          //     abort (403);
          // }
        
        // $this->authorize('admin');

        $totalUsers    = User::count();
        $totalIdeas    = Idea::count();
        $totalComments = Comment::count();

        return view('admin.dashboard', compact('totalUsers', 'totalIdeas', 'totalComments'));
    }
}
