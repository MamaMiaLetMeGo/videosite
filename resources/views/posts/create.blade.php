@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Create New Post</h1>
    </div>

    <form action="{{ route('posts.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-6">
            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
            <textarea name="content" id="content" rows="6" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Post</button>
        </div>
    </form>
@endsection