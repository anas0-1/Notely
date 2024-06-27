<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class NoteController extends Controller
{
    use AuthorizesRequests;

    // Index Method
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $notes = Note::query()
            ->when($search, function($query, $search) {
                return $query->where('title', 'LIKE', "%{$search}%")
                             ->orWhere('content', 'LIKE', "%{$search}%");
            })
            ->paginate(10);

        return view('notes.index', compact('notes'));
    }

    // Create Method
    public function create()
    {
        $categories = auth()->user()->categories;
        return view('notes.create', compact('categories'));
    }

    // Store Method
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        auth()->user()->notes()->create($request->all());

        return redirect()->route('notes.index')->with('success', 'Note created successfully.');
    }

    // Show Method
    public function show(Note $note)
    {
        $this->authorize('view', $note);
        return view('notes.show', compact('note'));
    }

    // Update Method
     public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('notes.show', $note->id)->with('success', 'Note updated successfully.');
    }

    // Destroy Method
    public function destroy(Note $note)
    {
        $this->authorize('delete', $note);
        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Note deleted successfully.');
    }
}

