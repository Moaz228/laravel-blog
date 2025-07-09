<x-layout :title="$pageTitle">
    <h2>Blog</h2>
    @foreach ($comments as $comment)
        <h2> {{ $comment->content }}</h2>
        <h2> {{ $comment->author }}</h2>
        <h2> {{ $comment->post }}</h2>
    @endforeach
</x-layout>