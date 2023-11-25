@auth
    <x-panel>
        <form action="/posts/{{ $post->slug }}/comments" method="post">
            @csrf
            <header class="flex items-center mb-4">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="Mr Change Me" class="rounded-full" width="40" height="40">
                <h2 class="font-bold ml-4">Leave a comment</h2>
            </header>

            <textarea
                name="body"
                id="body"
                class="w-full text-sm p-2 border border-gray-100 mb-3"
                cols="30"
                rows="6"
                placeholder="Say something cool."
                required></textarea>

            @error('body')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror

            <div class="flex justify-end">
                <x-submit-button>Post</x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="text-blue-500 hover:underline">Register</a> or
        <a href="/login" class="text-blue-500 hover:underline">Log in</a> to comment.
    </p>
@endauth