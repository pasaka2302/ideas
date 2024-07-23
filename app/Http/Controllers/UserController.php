<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(4);
          return view('users.shared.show', compact('user', 'ideas'));
        // return view('users.shared.show2', compact('user', 'ideas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $edit = true;
        $ideas   = $user->ideas()->paginate(4);
        return view('users.edit', compact('user', 'edit', 'ideas'));
        // return view('users.edit2', compact('user', 'edit', 'ideas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        $this->authorize('update', $user);

        $validated = request()->validate([
            'name' => 'required|min:3|max:240',
            'bio' => 'nullable|min:5|max:250',
            'image' => 'image'
        ]);
        
        if(request()->has('image')){
            $imagePath          = request()->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;
            
            Storage::disk('public')->delete($user->image ?? '');
        }

        $user->update($validated);

        return redirect()->route('users.show', $user->id)->with('flash', "Profile updated Successfully!");
    }

    public function profile(){
        return $this->show(auth()->user());
    }
}
