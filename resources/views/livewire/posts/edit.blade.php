<div>
    <form wire:submit="save" class="flex flex-col gap-6">
        <flux:input
            wire:model="title"
            label="{{ __('Title') }}"
            type="text"
            name="title"
            required
        />

        <flux:textarea
            wire:model="description"
            label="{{ __('Description') }}"
            name="description"
            required
        />

        <div>
            <flux:button variant="primary" type="submit">{{ __('Save') }}</flux:button>
        </div>
    </form>
</div>