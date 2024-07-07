<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserCanViewFullVideo
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() && $request->route('video')->video_path == $request->path) {
            return redirect()->route('videos.show', $request->route('video'));
        }

        return $next($request);
    }
}
