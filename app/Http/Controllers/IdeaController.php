<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function show(Idea $idea){
        
    // dd($idea->comments);
    //     return view('ideas.show',
    //     [
    //         'idea'=>$idea
    //     ]
    // );

    // return view('ideas.show', ['idea'=>$id]);

    // Alertanatively
    return view('ideas.show', compact('idea'));

    }

    public function edit(Idea $idea){
            // protecting the ideas only the owner can edit , update, delete it
            // if(auth()->id() !== $idea->user_id){
            //     abort(404);
            // }
            // using gate
            // $this->authorize('idea.edit', $idea);
             //   authorization using policy
            $this->authorize('update', $idea);
      //     return view('ideas.edit',
    //     [
    //         'idea'=>$idea
    //     ]
    //  );

        $editing = true;

        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea){

          // if(auth()->id() !== $idea->user_id){
          //     abort(404);
          // }
          // $this->authorize('idea.edit', $idea);
        // using policy to authorize update
            $this->authorize('update', $idea);
        // validating idea textarea
        $validated = request()->validate(
            [
                'content'=>'required|min:2|max:240'
            ]
        );

        // $idea->content = request()->get('content');
        
        // $idea->save();

        // An alternative to update the content
        $idea->update($validated);

        return redirect()->route('ideas.show', $idea->id)->with('flash', 'Idea Updated Successfully!');
    }


    public function store(){
        // validating idea textarea
       $validated = request()->validate(
            [
                'content'=>'required|min:2|max:240'
            ]
        );
        // dump(request()->all());
        // dd($validated);
        // $ideas = Idea::create(
        //     [
        //     'content' => request()->get('content', ''),
        //     ]
        // );
        // alternatively we can use this
        // $ideas = Idea::create(request()->all());
        // the above is not good for security reason due to mass assignment, here is the updated code
            $validated['user_id'] = auth()->id();
            Idea::create($validated);
       
       return redirect()->route('dashboard')->with('flash', 'Idea Created Successfully!');
    }

    public function destroy(Idea $idea){

          // if(auth()->id() !== $idea->user_id){
          //     abort(404);
          // }
        //   $this->authorize('idea.delete', $idea);
        // policy to authorize
         $this->authorize('delete', $idea);
        // Another way to delete without where
        // this $id in (Idea $id) must match this $id here $id->delete()
        // $ideas = Idea::where('id', $id)->firstOrFail();
        $idea->delete();
        // unaweza ziunganisha kama hivi
        // $ideas = Idea::where('id', $id)->firstOrFail()->delete();

       return redirect()->route('dashboard')->with('flash', 'Idea deleted Successfully!');

    }
}
