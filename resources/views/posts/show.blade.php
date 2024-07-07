@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <p>Created at: {{ $post->created_at->format('F d, Y H:i') }}</p>
    <a href="{{ route('posts.index') }}" class="btn btn-primary">Back to Posts</a>
</div>
@endsection