@props(['comment'])
<x-panel class="bg-gray-50">
    <article class="flex space-x-4">
        <div class="mr-3 flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u={{ $comment->user_id }}" alt="Mr Change Me" class="rounded-xl" width="60" height="60">
        </div>
        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{ $comment->author->username }}</h3>
                <p class="text-xs mt-1">Posted:
                    <time>{{ $comment->created_at->format('D jS M Y \a\t H:i') }}</time>
                </p>
            </header>
    
            <p>
                {{ $comment->body }}
            </p>
        </div>
    </article>
</x-panel>