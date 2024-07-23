<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){

        $ideas = Idea::orderby('created_at', 'DESC');

        if (request()->has('search')) {
            $ideas = $ideas->search(request('search', ''));
        }

        // $topUsers = User::withCount('ideas')->orderby('ideas_count', 'DESC')->limit(5)->get();

        return view('dashboard', [
            'ideas' => $ideas->paginate(4)
        ]);

    //  return view('home');
    
    }
}

