<!-- resources/views/components/button.blade.php -->

@props(['type' => 'submit'])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75']) }}>
    {{ $slot }}
</button>
