<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $notes = Auth::user()->notes()->latest('updated_at')->paginate(5);
        // You also use this as of laravel 7
        $notes = Note::whereBelongsTo(Auth::user())->latest('updated_at')->paginate(5);  

        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');
    }

    protected function validateNoteData() {
        return request()->validate([
            'title' => 'required|max:255',
            'text' => 'required',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validateNoteData();

        Auth::user()->notes()->create($validated);

        return redirect(route('notes.index'))->with('success', 'Note created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
       if($note->user_id !== Auth::id()) {
         abort(403);
       }
       return view('notes.show')->with('note', $note);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note, Request $request)
    {
        return view('notes.edit')->with('note', $note);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $validated = $this->validateNoteData();
        $validated['notebook_id'] = $request->notebook_id;
        $note->update($validated);

        return redirect(route('notes.show', $note))->with('success', 'Note updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect(route('notes.index'))->with('success', 'Note deleted successfully.');
    }

    
}
