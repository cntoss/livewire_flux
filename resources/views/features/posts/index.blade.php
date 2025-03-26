<x-layouts.app>
    <div class="space-y-8">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold">{{ __('Posts') }}</h1>

            <flux:button href="{{ route('blog-posts.create') }}" wire:navigate>
                {{ __('New Post') }}
            </flux:button>
        </div>

        <div class="mt-4 rounded-xl border border-zinc-200 bg-white dark:border-zinc-700 dark:bg-zinc-900 m-4 p-4">
            <table class="min-w-full divide-y divide-zinc-200 dark:divide-zinc-700">
                <thead class="bg-zinc-50 dark:bg-zinc-800">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider"
                            style="width: 240px; word-wrap: break-word;">
                            Title
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider"
                            style="width: 300px; word-wrap: break-word;">
                            Description
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-zinc-200 dark:bg-zinc-900 dark:divide-zinc-700">
                    @foreach ($posts as $post)
                        <tr>
                            <td class="px-6 py-4 text-sm text-zinc-900 dark:text-zinc-100"
                                style="max-width: 240px; word-wrap: break-word; overflow: hidden; text-overflow: ellipsis;">
                                <div class="truncate">{{ $post->title }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-zinc-900 dark:text-zinc-100"
                                style="max-width: 300px; word-wrap: break-word; overflow: hidden; text-overflow: ellipsis;">
                                <div class="truncate">{{ $post->description }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-zinc-900 dark:text-zinc-100">
                                <a href="{{ route('blog-posts.show', $post) }}" class="text-blue-500 hover:underline">Read
                                    more</a>
                                <a href="{{ route('blog-posts.edit', $post) }}"
                                    class="ml-4 text-yellow-500 hover:underline">Edit</a>
                                <form action="{{ route('blog-posts.destroy', $post) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ml-4 text-red-500 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>