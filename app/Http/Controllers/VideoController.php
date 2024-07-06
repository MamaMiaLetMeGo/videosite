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
        $videos = Video::latest()->paginate(10);
        return view('videos.index', compact('videos'));
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
        if (Storage::disk('public')->exists($video->video_path)) {
            $path = Storage::disk('public')->path($video->video_path);
            $content = file_get_contents($path);
            $type = Storage::disk('public')->mimeType($video->video_path);

            return response($content)->header('Content-Type', $type);
        }

        abort(404);
    }

    // Add other methods as needed (edit, update, destroy)
}