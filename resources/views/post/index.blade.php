<x-layout :title="$pageTitle">
    @if (session('success'))
    <div class="bg-green-50 px-3 py-2">
        {{ session('success') }}
    </div>
    @endif
    <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="/blog/create" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</a>
    </div>
    @foreach ($posts as $post)
        <div class="fl3ex justify-between items-center border border-gray-200 px-4 py-6 my-2">
            <div>
                <h1 class="text-2xl">
                    <a href="/blog/{{ $post->id }}">{{ $post->title }}</a>
                </h2>
                <p class="text-1xl">{{ $post->author }}</p>
            </div>
            <div>
                <a class="hover:text-gray-500 text-yellow-500" href="/blog/{{ $post->id }}/edit">Edit</a>
                <form method="POST" action="/blog/{{ $post->id }}" onsubmit="return confirm('Are you sure? This action cannot be reversed')">
                    @csrf
                    @method('DELETE')
                    <button class="hover:text-gray-500 text-red-500">Delete</button>
                </form>
            </div>
        </div>
    @endforeach


    {{ $posts->links() }}
</x-layout>