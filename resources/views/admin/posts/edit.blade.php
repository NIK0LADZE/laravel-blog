<x-layout>
    <x-admin.dashboard :heading="'Edit Post: ' . $post->title">
        <form method="POST" action="{{ route('admin.posts.update', $post) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input label="Title" id="title" name="title" type="text" :value="old('title', $post->title)" required />
            <x-form.input label="Slug" id="slug" name="slug" type="text" :value="old('slug', $post->slug)" required />

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input label="Thumbnail" id="thumbnail" name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" accept="image/jpeg,image/png,image/jpg" />
                </div>

                @if ($post->hasMedia('post_images'))
                    <img src="{{ $post->getFirstMediaUrl('post_images') }}" alt="" class="rounded-xl ml-6" width="100">
                @endif
            </div>

            <x-form.input label="Publish date" id="published_at" name="published_at" type="date" :value="old('published_at', $post->published_at->format('Y-m-d'))" required />
            <x-form.textarea label="Excerpt" id="excerpt" name="excerpt" required>{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            <x-form.textarea label="Body" id="body" name="body" required>{{ old('body', $post->body) }}</x-form.textarea>

            <x-form.field>
                <x-form.label label="Category" for="category_id" />

                <select name="category_id" id="category_id" required>
                    @foreach ($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category" />
            </x-form.field>

            <x-form.button type="primary" class="mt-6">Update</x-form.button>
        </form>
    </x-admin.dashboard>
</x-layout>
