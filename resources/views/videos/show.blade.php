@extends('layouts.app')

@section('title', $video->title)

@section('content')
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <video class="w-full" controls>
            <source src="{{ route('videos.show', $video) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $video->title }}</h1>
            <p class="text-gray-600 mb-4">{{ $video->description }}</p>
            <a href="{{ route('videos.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to Videos</a>
        </div>
    </div>
@endsection