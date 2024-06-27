@extends('layouts.app')

@section('title', 'Create Note')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-semibold text-gray-800 mb-4">Create Note</h1>
    <form method="POST" action="{{ route('notes.store') }}">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700">Title</label>
            <input type="text" id="title" name="title" class="border border-gray-300 rounded py-2 px-4 w-full" value="{{ old('title') }}" required>
        </div>
        <div class="mb-4">
            <label for="content" class="block text-gray-700">Content</label>
            <textarea id="content" name="content" class="border border-gray-300 rounded py-2 px-4 w-full" required>{{ old('content') }}</textarea>
        </div>
        <div class="mb-4">
            <label for="category_id" class="block text-gray-700">Category</label>
            <select id="category_id" name="category_id" class="border border-gray-300 rounded py-2 px-4 w-full" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save Note</button>
    </form>
</div>
@endsection
