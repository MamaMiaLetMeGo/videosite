@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Posts</h1>
        <a href="{{ route('posts.create') }}" class="mt-2 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create New Post</a>
    </div>

    @foreach($posts as $post)
        <div class="bg-white shadow-md rounded-lg mb-6 p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $post->title }}</h2>
            <p class="text-gray-600 mb-4">{{ Str::limit($post->content, 200) }}</p>
            <a href="{{ route('posts.show', $post) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Read More</a>
        </div>
    @endforeach

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
@endsection