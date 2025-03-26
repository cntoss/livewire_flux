<x-layouts.app>
    <div class="space-y-6 max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md dark:bg-zinc-900">
        <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-100">{{ $post->title }}</h1>
        <p class="text-zinc-700 dark:text-zinc-300">{{ $post->description }}</p>

        <div class="flex justify-between">
            <a href="{{ route('blog-posts.index') }}" class="text-blue-500 hover:underline">
                ← Back to Posts
            </a>
            <a href="{{ route('blog-posts.edit', $post) }}" class="text-yellow-500 hover:underline">
                ✏️ Edit
            </a>
        </div>
    </div>
</x-layouts.app>