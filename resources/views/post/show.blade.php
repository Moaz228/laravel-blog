<x-layout :title="$pageTitle">
    <h2> {{ $post->title }}</h2>
    <p> {{ $post->body }}</p>
    <p> {{ $post->author }}</p>
    <p> {{ $post->created_at }}</p>
    <ul>
        @foreach ($post->comments as $comment)
        <li>{{ $comment->content }}, {{ $comment->author }}</li>
        @endforeach
    </ul>
</x-layout>