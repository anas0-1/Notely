@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Notes</h1>

    <div class="mb-4">
        <a href="{{ route('notes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create Note</a>
    </div>
    <div class="mb-4">
        <form action="{{ route('notes.index') }}" method="GET">
            <input type="text" name="search" placeholder="Search..." class="border rounded p-2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
        </form>
    </div>
    <div class="grid grid-cols-3 gap-4">
        @foreach($notes as $note)
            <div class="bg-white p-4 shadow-md rounded-lg">
                <h2 class="text-lg font-bold mb-2">{{ \Illuminate\Support\Str::limit($note->title, 12, $end='...') }}</h2>
                <p class="text-gray-600">{{ \Illuminate\Support\Str::limit($note->content, 12, $end='...') }}</p>

                <div class="mt-2">
                    <a href="{{ route('notes.show', $note->id) }}" class="text-blue-500">View</a>
                    <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="inline ml-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500" onclick="return confirm('Are you sure you want to delete this note?')">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $notes->links() }}
    </div>
</div>
@endsection
