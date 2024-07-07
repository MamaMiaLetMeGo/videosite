@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4 bg-gray-100 border-b">
            <h1 class="text-2xl font-bold text-gray-800">Create New Post</h1>
        </div>
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="px-6 py-4 space-y-6">
            @csrf
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text" class="custom-input w-full" id="title" name="title" required>
            </div>
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Content</label>
                <textarea class="custom-input w-full" id="content" name="content" rows="5" required></textarea>
            </div>
            <div>
                <label for="video" class="block text-sm font-medium text-gray-700 mb-1">Video (optional)</label>
                <input type="file" class="w-full text-sm text-gray-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-indigo-50 file:text-indigo-700
                    hover:file:bg-indigo-100" id="video" name="video" accept="video/mp4">
            </div>
            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Create Post
                </button>
            </div>
        </form>
    </div>
</div>
@endsection