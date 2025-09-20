@extends('admin.layout')

@section('title', 'Add Bouquet')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <h1 class="text-3xl font-bold text-yellow-500 mb-6 text-center">Add Bouquet</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.bouquets.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block text-yellow-400 mb-1">Bouquet Name</label>
            <input type="text" name="name" class="w-full bg-gray-800 border border-yellow-500 rounded p-2 text-white" maxlength="20" required>
        </div>

        <div>
            <label class="block text-yellow-400 mb-1">Description</label>
            <textarea name="description" class="w-full bg-gray-800 border border-yellow-500 rounded p-2 text-white" rows="4" maxlength="100" required></textarea>
        </div>

        <div>
            <label class="block text-yellow-400 mb-1">Price (Rs.)</label>
            <input type="number" name="price" step="0.01" class="w-full bg-gray-800 border border-yellow-500 rounded p-2 text-white" required>
        </div>

        <div>
            <label class="block text-yellow-400 mb-1">Image</label>
            <input type="file" name="image" class="w-full bg-gray-800 border border-yellow-500 rounded p-2 text-white" accept="image/*">
        </div>

        <div class="flex justify-between mt-6">
            <a href="{{ route('admin.bouquets.index') }}" class="bg-gray-700 text-yellow-500 px-4 py-2 rounded hover:bg-gray-600">Back to List</a>
            <button type="submit" class="bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-600">Add Bouquet</button>
        </div>
    </form>
</div>
@endsection
