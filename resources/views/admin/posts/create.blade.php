<x-layout>
    <x-setting heading="Publish New Post">
        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf
                <x-form.input name="title" required />
                <x-form.input name="slug" required />
                <x-form.input name="thumbnail" type="file" />
                <x-form.textarea name="excerpt" required />
                <x-form.textarea name="body" required />

                <div class="mb-6">
                    <x-form.label name="category" />

                    <select name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option {{ old('category_id') == $category->id ? 'selected' : '' }}
                                value="{{ $category->id }}"
                            >
                                {{ ucwords($category->name) }}
                            </option>
                        @endforeach
                    </select>

                    <x-form.error name="category" />
                </div>

                <div class="mb-6">
                    <x-form.button>Publish Post</x-form.button>
                </div>
        </form>
    </x-setting>
</x-layout>
