@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-r from-black via-gray-900 to-yellow-900 text-white py-12 mb-8">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-2">Welcome to Our Video Platform</h1>
        <p class="text-xl">Discover and enjoy a world of amazing content</p>
    </div>
</div>

<div class="container mx-auto px-4">
    <div class="flex flex-col md:flex-row">
        <!-- Main Content -->
        <main class="md:w-2/3 pr-4">
            <div class="bg-white shadow-md rounded-lg mb-8">
                <div class="bg-gray-100 px-6 py-4 rounded-t-lg">
                    <h2 class="text-xl font-semibold text-gray-800">{{ __('Dashboard') }}</h2>
                </div>

                <div class="p-6">
                    @if (session('status'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('status') }}</span>
                        </div>
                    @endif

                    <p class="text-gray-700 mb-4">{{ __('You are logged in!') }}</p>

                    <div class="mt-4">
                        <a href="{{ route('videos.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">View All Videos</a>
                    </div>
                </div>
            </div>

            <!-- Video Previews -->
            <h2 class="text-2xl font-bold mb-4">Latest Videos</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @foreach($videos as $video)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <video class="w-full h-48 object-cover" poster="{{ asset('storage/' . $video->thumbnail) }}" preload="metadata">
                            <source src="{{ asset('storage/' . $video->preview_path) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <div class="p-4">
                            <h3 class="font-bold text-xl mb-2">{{ $video->title }}</h3>
                            <p class="text-gray-700 text-base mb-4">{{ Str::limit($video->description, 100) }}</p>
                            <a href="{{ route('videos.show', $video) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Watch Now</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>

        <!-- Sidebar -->
        <aside class="md:w-1/3 mt-8 md:mt-0">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Featured Content</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-blue-600 hover:underline">Top 10 Videos This Week</a></li>
                    <li><a href="#" class="text-blue-600 hover:underline">New Releases</a></li>
                    <li><a href="#" class="text-blue-600 hover:underline">Editor's Picks</a></li>
                </ul>
            </div>
        </aside>
    </div>
</div>
@endsection