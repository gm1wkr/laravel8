<x-drop-down>
    <x-slot name="trigger">
        <button
            class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex"
        >
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
            <x-icon name="down-arrow" class="absolute pointer-events-none" />
        </button>
    </x-slot>

    <x-drop-down-item 
        href="/?{{ http_build_query(request()->except('category', 'page')) }}"
        :active="request()->routeIs('home')"
    >
        All
    </x-drop-down-item>

    @foreach($categories as $category)
        <x-drop-down-item 
            href="?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
            :active="isset($currentCategory) && $currentCategory->id === $category->id"
        >
            {{ ucwords($category->name) }}
        </x-drop-down-item>
    @endforeach
</x-drop-down>