<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $followingsId = auth()->user()->followings()->pluck('user_id');

        $ideas = Idea::whereIn('user_id', $followingsId)->latest();

        if (request()->has('search')) {
              // $ideas = $ideas->where('content', 'like', '%'. request()->get('search','') . '%');
              // alternatively using local scope
            $ideas = $ideas->search(request('search', ''));
        }

        return view('feed', [  
            'ideas'=>$ideas->paginate(4)
            ]
        );
    
    }
}
