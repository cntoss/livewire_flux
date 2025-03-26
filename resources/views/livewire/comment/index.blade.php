<div class="h-full w-full flex-1">

    <flux:button :href="route('comments.create')" class="mb-4">
        Create
    </flux:button>

    <div class="min-w-full align-middle">
        <table class="min-w-full divide-y divide-gray-200 border">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span
                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Comment</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                    </th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                @foreach($comments as $comment)
                    <tr class="bg-white">
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                            {{ $comment->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                            {{ $comment->content }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                            {{ $comment->post->title }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                            <flux:button :href="route('comments.edit', $comment)">Edit</flux:button>
                            <flux:button variant="danger" wire:click="delete({{ $comment->id }})"
                                wire:confirm="Are you sure?">Delete</flux:button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-2">
        {{ $comments->links() }}
    </div>

</div>