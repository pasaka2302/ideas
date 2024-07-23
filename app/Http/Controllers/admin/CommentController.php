<?php

namespace App\Http\Controllers\admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index(){

        $comments = Comment::latest()->paginate(5);
    
        return view('admin.comments.index', compact('comments'));
    }

    public function destroy(Comment $comment){
        $comment->delete();
        return redirect()->route('admin.comments.index')->with('flash', 'Comment deleted Successfully!');
    }
}
