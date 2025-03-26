<x-layouts.app>

    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md dark:bg-zinc-900">
        <h1 class="text-2xl font-bold text-zinc-900 dark:text-zinc-100">Create New Post</h1>

        <form action="{{ route('blog-posts.store') }}" method="POST">
            @csrf
            <div>
                <label for="title">{{ __("Title") }}</label>
                <input type="text" name="title" id="title" placeholder="{{ __("Title") }}" required>
            </div>
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" placeholder="Description" required></textarea>
            </div>
            <div>
                <button type="submit">
                    Create Post
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>