<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoryController extends Controller
{
    use AuthorizesRequests;

    // Index Method
    public function index(Request $request)
    {
        $query = auth()->user()->categories();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $categories = $query->paginate(10);
        return view('categories.index', compact('categories'));
    }

    // Create Method
    public function create()
    {
        return view('categories.create');
    }

    // Store Method
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        auth()->user()->categories()->create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    // Show Method
    public function show(Category $category)
    {
        $this->authorize('view', $category);
        $notes = $category->notes()->paginate(10);
        return view('categories.show', compact('category', 'notes'));
    }

    // Edit Method
    public function edit(Category $category)
    {
        $this->authorize('update', $category);
        return view('categories.edit', compact('category'));
    }

    // Update Method
    public function update(Request $request, Category $category)
    {
        $this->authorize('update', $category);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Destroy Method
    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
