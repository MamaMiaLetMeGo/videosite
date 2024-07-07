@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <video class="w-full" controls poster="{{ asset('storage/' . $video->thumbnail) }}">
            <source src="{{ asset('storage/' . $videoPath) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $video->title }}</h1>
            <p class="text-gray-600 mb-4">{{ $video->description }}</p>
            
            @if(!$canViewFullVideo)
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4" role="alert">
                    <p>This is a preview. <a href="{{ route('login') }}" class="font-bold underline">Log in</a> to watch the full video.</p>
                </div>
            @endif
            
            <a href="{{ route('videos.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to Videos</a>
        </div>
    </div>
</div>
@endsection