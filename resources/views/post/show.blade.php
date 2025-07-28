<x-layout :title="$pageTitle">
    @if (session('success'))
    <div class="bg-green-50 px-3 py-2">
        {{ session('success') }}
    </div>
    @endif

    <div class="post-content mb-10">
        <h2> {{ $post->title }}</h2>
        <p> {{ $post->body }}</p>
        <p> {{ $post->author }}</p>
        <p> {{ $post->created_at }}</p>
    </div>

    <hr class="my-10">

    <div class="comments-section">
        <h2 class="text-xl font-bold">Comments</h2>


        <ul class="space-y-4 mt-6">
            @foreach ($post->comments as $comment)
            <li class="border-b pb-4 bg-gray-100">
                <p class="text-gray-900">{{ $comment->content }}</p>
                <p class="text-sm text-gray-500 mt-1">— {{ $comment->author }}</p>
            </li>
            @endforeach
        </ul>

        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
                            <div class="mt-2">
                                <input id="name" type="text" value="{{ old('name') }}" name="name" class="{{ $errors->has('name') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                            </div>
                            @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-full">
                            <label for="body" class="block text-sm/6 font-medium text-gray-900">Comment</label>
                            <div class="mt-2">
                                <textarea id="comment" name="comment" rows="3" class="{{ $errors->has('comment') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ old('comment') }}</textarea>
                            </div>
                            @error('comment')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                            <p class="mt-3 text-sm/6 text-gray-600">Write a comment on this post</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Comment</button>
            </div>
        </form>
    </div>

</x-layout>