<x-layouts.app>

    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md dark:bg-zinc-900">
        <h1 class="text-2xl font-bold text-zinc-900 dark:text-zinc-100">Edit Post</h1>

        <form action="{{ route('blog-posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="title">Title:</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}" required>
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea name="description" required>{{ old('description', $post->description) }}</textarea>
            </div>
            <div>
                <button type="submit">Update Post</button>
            </div>
        </form>
    </div>
</x-layouts.app>