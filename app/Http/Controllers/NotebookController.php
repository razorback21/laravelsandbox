<?php

namespace App\Http\Controllers;

use App\Models\NoteBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotebookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('notebooks.index', [
            'notebooks' => Auth::user()->notebooks()->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notebooks.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
            'name' => 'required|max:255',
        ]);
        
        $user_id = Auth::id();
        $notebook = new Notebook();
        $notebook->user_id = $user_id;
        $notebook->name = $validated['name'];
        $notebook->save();

        return redirect(route('notebooks.index'))->with('success', 'Notebook created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Notebook $notebook)
    {
        $this->authorize('view', $notebook);
        return view('notebooks.show')->with('notebook', $notebook); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notebook $notebook)
    {
        return view('notebooks.edit')->with('notebook', $notebook); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notebook $notebook)
    {
        $validated = request()->validate([
            'name' => 'required|max:255',
        ]);

        $notebook->update($validated);

        //or we can also use to_route here to_route('notebooks.index', $notebook);
        return redirect(route('notebooks.show', $notebook))->with('success', 'Notebook updated successfully.');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notebook $notebook)
    {
        $notebook->delete();

        //You can also use this redirect(route('notebooks.index'))->with('success', 'Notebook deleted successfully.');
        return to_route('notebooks.index', $notebook)->with('success', 'Notebook deleted successfully.');
        
    }
}
