@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-yellow-100 border-l-4 border-yellow-500 p-4 mb-4">
        <h1 class="text-2xl font-bold mb-2">{{ $note->title }}</h1>
        <p>{{ $note->content }}</p>
    </div>

    <div class="mt-4">
        <a href="{{ route('notes.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Back to Notes</a>
    </div>

    <div class="mt-4">
        <h2 class="text-xl font-bold mb-2">Update Note</h2>
        <form action="{{ route('notes.update', $note->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block">Title</label>
                <input type="text" name="title" id="title" class="border rounded p-2 w-full" value="{{ $note->title }}">
            </div>
            <div class="mb-4">
                <label for="content" class="block">Content</label>
                <textarea name="content" id="content" class="border rounded p-2 w-full" rows="5">{{ $note->content }}</textarea>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
