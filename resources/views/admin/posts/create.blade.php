<x-layout>
    <x-admin.dashboard heading="Publish New Post">
        <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
            @csrf

            <x-form.input label="Title" id="title" name="title" type="text" required />
            <x-form.input label="Slug" id="slug" name="slug" type="text" required />
            <x-form.input label="Thumbnail" id="thumbnail" name="thumbnail" type="file" accept="image/jpeg,image/png,image/jpg" required />
            <x-form.input label="Publish date" id="published_at" name="published_at" type="date" required />
            <x-form.textarea label="Excerpt" id="excerpt" name="excerpt" required />
            <x-form.textarea label="Body" id="body" name="body" required />

            <x-form.field>
                <x-form.label label="Category" for="category_id" />

                <select name="category_id" id="category_id" required>
                    @foreach ($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category" />
            </x-form.field>

            <x-form.button type="primary" class="mt-6">Publish</x-form.button>
        </form>
    </x-admin.dashboard>
</x-layout>
