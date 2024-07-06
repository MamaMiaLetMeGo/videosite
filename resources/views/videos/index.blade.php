@extends('layouts.app')

@section('title', 'Videos')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Videos</h1>
        <a href="{{ route('videos.create') }}" class="mt-2 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Upload New Video</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($videos as $video)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <video class="w-full h-48 object-cover" poster="{{ asset('storage/' . $video->video_path) }}">
                    <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $video->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ Str::limit($video->description, 100) }}</p>
                    <a href="{{ route('videos.show', $video) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Watch</a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $videos->links() }}
    </div>
@endsection