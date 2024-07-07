<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    // Remove the __construct method if it exists

    public function index()
    {
        $videos = Video::latest()->take(6)->get(); // Adjust the number as needed
        return view('home', compact('videos'));
    }

    public function create()
    {
        return view('videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'video_file' => 'required|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:100000',
        ]);

        $videoPath = $request->file('video_file')->store('videos', 'public');

        Video::create([
            'title' => $request->title,
            'description' => $request->description,
            'video_path' => $videoPath,
        ]);

        return redirect()->route('videos.index')->with('success', 'Video uploaded successfully.');
    }

    public function show(Video $video)
    {
        $canViewFullVideo = auth()->check();
        
        // Determine which video path to use
        $videoPath = $canViewFullVideo ? $video->video_path : $video->preview_path;
        
        return view('videos.show', compact('video', 'canViewFullVideo', 'videoPath'));
    }

    public function serveVideo($path)
    {
        return response()->file(storage_path('app/public/' . $path));
    }

    // Add other methods as needed (edit, update, destroy)
}