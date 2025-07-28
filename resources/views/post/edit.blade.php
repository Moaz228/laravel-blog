    <x-layout :title="$pageTitle">
        <form method="POST" action="/blog/{{ $post->id }}">
            @csrf
            @method('PUT')

            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <p class="mt-1 text-sm/6 text-gray-600">Use this form to edit post: {{ $post->title }}</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="post-title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                            <div class="mt-2">
                                <input id="post-title" type="text" value="{{ old('title', $post->title) }}" name="post-title" class="{{ $errors->has('post-title') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                            </div>
                            @error('post-title')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="sm:col-span-3">
                            <label for="author-name" class="block text-sm/6 font-medium text-gray-900">Author</label>
                            <div class="mt-2">
                                <input id="author-name" type="text" value="{{ old('author-name', $post->author) }}" name="author-name" class="{{ $errors->has('author-name') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                            </div>
                            @error('author-name')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-full">
                            <label for="body" class="block text-sm/6 font-medium text-gray-900">Content</label>
                            <div class="mt-2">
                                <textarea id="body" name="body" rows="3" class="{{ $errors->has('body') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ old('body', $post->body) }}</textarea>
                            </div>
                            @error('body')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                            <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about the article</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/blog" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Publish</button>
            </div>
        </form>

    </x-layout>