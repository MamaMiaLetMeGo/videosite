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

            <!-- Latest Posts with Thumbnails -->
            <h2 class="text-2xl font-bold mb-4">Latest Videos</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @foreach($latestPosts as $post)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        @if($post->thumbnail_path)
                            <img src="{{ asset('storage/' . $post->thumbnail_path) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">No Thumbnail</div>
                        @endif
                        <div class="p-4">
                            <h3 class="font-bold text-xl mb-2">{{ $post->title }}</h3>
                            <p class="text-gray-700 text-base mb-4">{{ Str::limit($post->content, 100) }}</p>
                            <a href="{{ route('posts.show', $post) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Watch Now</a>
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
@section('footer')
<!-- Footer -->
<footer class="bg-gray-800 text-white mt-12 w-full">
    <div class="container mx-auto px-4 py-8">
        <!-- Row 1 -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <div>
                <h3 class="text-lg font-semibold mb-4">GPOAT MEDIA, LLC</h3>
                <p>All performers appearing in this web site are adults age 18 years or older.</p>
                <p>18 U.S.C. 2257 Record-Keeping Requirements Compliance Statement</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-gray-300">Home</a></li>
                    <li><a href="#" class="hover:text-gray-300">Videos</a></li>
                    <li><a href="#" class="hover:text-gray-300">Login</a></li>
                    <li><a href="#" class="hover:text-gray-300">Terms and Conditions</a></li>
                    <li><a href="#" class="hover:text-gray-300">Privacy Policy</a></li>
                    <li><a href="#" class="hover:text-gray-300">Customer Support</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Follow</h3>
                <div class="flex space-x-4">
                    <a href="#" class="hover:text-gray-300">Twitter</a>
                    <a href="#" class="hover:text-gray-300">Instagram</a>
                </div>
            </div>
        </div>
        
        <!-- Row 2 -->
        <div class="border-t border-gray-700 pt-8 mb-8">
            <h3 class="text-lg font-semibold mb-4">Subscribe to My Newsletter</h3>
            <form class="flex flex-col md:flex-row">
                <input type="email" placeholder="Enter your email" class="bg-gray-700 text-white px-4 py-2 mb-2 md:mb-0 md:mr-2 rounded">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded">Subscribe</button>
            </form>
        </div>
        
        <!-- Row 3 -->
        <div class="text-center">
            <p>&copy; 2024 GPOAT. All rights reserved.</p>
            <p>All models have two forms of ID (Passport, Drivers license). Picture holding up form of ID(s) beside face.
            Pre-shoot video consent. Post-shoot video consent. In-video consent or known as BTS (behind he scenes showing affirmative consent and purpose).</p>
        </div>
    </div>
</footer>
@endsection