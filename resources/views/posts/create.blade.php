@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4 bg-gray-100 border-b">
            <h1 class="text-2xl font-bold text-gray-800">Create New Post</h1>
        </div>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="px-6 py-4 space-y-6">
            @csrf
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text" class="custom-input w-full" id="title" name="title" required value="{{ old('title') }}">
            </div>
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Content</label>
                <textarea class="custom-input w-full" id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
            </div>
            <div>
                <label for="video" class="block text-sm font-medium text-gray-700 mb-1">Video (optional)</label>
                <input type="file" class="custom-input w-full" id="video" name="video" accept="video/mp4,video/avi,video/mpeg,video/quicktime">
            </div>
            <div>
                <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-1">Thumbnail</label>
                <input type="file" class="custom-input w-full" id="thumbnail" name="thumbnail" accept="image/*" required>
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