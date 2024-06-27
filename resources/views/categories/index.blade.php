@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Categories</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-2 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create Category</a>
    </div>

    <div class="mb-4">
        <form action="{{ route('categories.index') }}" method="GET">
            <input type="text" name="search" placeholder="Search..." class="border rounded p-2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
        </form>
    </div>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $category->name }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('categories.show', $category->id) }}" class="text-blue-500">View</a>
                        <a href="{{ route('categories.edit', $category->id) }}" class="text-yellow-500 ml-2">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $categories->links() }}
    </div>
</div>
@endsection
