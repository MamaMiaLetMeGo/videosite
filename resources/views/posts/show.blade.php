@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $post->title }}</h1>
            <p class="text-gray-600 mb-4">{{ $post->content }}</p>
            @if($post->video_path)
                <div class="mb-4">
                    <video width="100%" controls>
                        <source src="{{ asset('storage/'.$post->video_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            @endif
            <p class="text-sm text-gray-500">Created at: {{ $post->created_at->format('F d, Y H:i') }}</p>
        </div>
    </div>
    <div class="mt-4 text-center">
        <a href="{{ route('posts.index') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Back to Posts</a>
    </div>
</div>
@endsection