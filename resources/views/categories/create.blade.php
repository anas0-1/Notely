@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Create Category</h1>

    @if($errors->any())
        <div class="bg-red-500 text-white p-2 mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block">Name</label>
            <input type="text" name="name" id="name" class="border rounded p-2 w-full" value="{{ old('name') }}">
        </div>
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
        </div>
    </form>
</div>
@endsection
