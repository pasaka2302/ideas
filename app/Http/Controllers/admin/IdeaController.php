<?php

namespace App\Http\Controllers\admin;

use App\Models\Idea;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IdeaController extends Controller
{
    public function index(){

    $ideas = Idea::latest()->paginate(5);

    return view('admin.ideas.index', compact('ideas'));
}

}
