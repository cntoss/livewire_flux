{{-- @php
dd(lang_path());
@endphp --}}
<div>
    <form wire:submit="save" class="flex flex-col gap-6">
        <flux:input wire:model="name" label="{{ __('Title') }}" type="text" name="name" required autofocus />

        <flux:input.group>
            <flux:select wire:model="post_id" class="max-w-fit" label="{{ 'Post' }}">
                <flux:select.option value="">{{ __('Select Post') }}</flux:select.option>
                @foreach($posts as $post)
                    <flux:select.option value="{{ $post->id }}" :selected="$post_id == $post->id">
                        {{ $post->title }}
                    </flux:select.option>
                @endforeach
            </flux:select>
        </flux:input.group>

        <flux:textarea wire:model="content" label="{{ __('Content') }}" name="content" required />

        <div>
            <flux:button variant="primary" type="submit">{{ __('Save') }}</flux:button>
        </div>
    </form>
</div>