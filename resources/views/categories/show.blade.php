@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Category: {{ $category->name }}</h1>

    <div class="mb-4">
        <a href="{{ route('categories.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Back to Categories</a>
    </div>

    <h2 class="text-xl font-bold mb-2">Notes</h2>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Title</th>
                <th class="py-2 px-4 border-b">Content</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notes as $note)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $note->title }}</td>
                    <td class="py-2 px-4 border-b">{{ $note->content }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $notes->links() }}
    </div>
</div>
@endsection
