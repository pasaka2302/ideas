<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function store(Idea $idea)
    {
        $fieldName = 'comment_content_' . $idea->id;
        $validated = request()->validate(
            [
                $fieldName => 'required|min:1|max:5000',
            ],
            [
                $fieldName . '.required' => "The comment content is required",
                $fieldName . '.min' => "Comment content should be at least :min character",
                $fieldName . '.max' => "Comment content should not exceed :max characters"
            ]
        );

        try {
            Comment::create([
                'user_id' => auth()->id(),
                'idea_id' => $idea->id,
                'content' => $validated[$fieldName]
            ]);
        } catch (\Exception $e) {
            Log::error("Failed to create comment" . $e->getMessage());
            return redirect()->back()->withErrors(['content' => "Failed to create comment. Please try again Letter!"]);
        }

        return redirect()->route('ideas.show', $idea->id)->with('flash', 'Comment Posted Successfully!');
    }
}
