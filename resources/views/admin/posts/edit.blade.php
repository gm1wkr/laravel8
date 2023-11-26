<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title">
        <form action="/admin/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
                <x-form.input name="title" :value="old('title', $post->title)" />
                <x-form.input name="slug" :value="old('slug', $post->slug)" required />
                
                <div class="flex mt-6">
                    <div class="flex-1">
                        <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                    </div>
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
                </div>

                <x-form.textarea name="excerpt" value="kjhkjk" required>{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
                <x-form.textarea name="body" value="kjhkjk" required>{{ old('body', $post->body) }}</x-form.textarea>

                <div class="mb-6">
                    <x-form.label name="category" />

                    <select name="category_id" id="category_id">
                        @foreach(\App\Models\Category::all() as $category)
                            <option {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                                value="{{ $category->id }}"
                            >
                                {{ ucwords($category->name) }}
                            </option>
                        @endforeach
                    </select>

                    <x-form.error name="category" />
                </div>

                <div class="mb-6">
                    <x-form.button>Update Post</x-form.button>
                </div>
        </form>
    </x-setting>
</x-layout>
