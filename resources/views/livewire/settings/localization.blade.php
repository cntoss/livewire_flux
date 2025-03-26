<section class="flex flex-col items-start">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Language')" :subheading=" __('Update the Language settings for your account')">
        <form wire:submit="save">
            <flux:input.group>
                <div>
                    <flux:select wire:model.live="locale">
                        <flux:select.option value="en">{{ __('English') }}</flux:select.option>
                        <flux:select.option value="np">{{ __('Nepali') }}</flux:select.option>
                    </flux:select>
                </div>
            </flux:input.group>
            <div class="mt-4">
                <flux:button type="submit" on="localization-updated">{{ __('Save Changes') }}</flux:button>
            </div>
        </form>
    </x-settings.layout>


    @script
    <script>
        $wire.on('localization-updated', (event) => {
            if (event[0].title && event[0].message && event[0].type) {
                Toast.fire({
                    icon: event[0].type,
                    title: event[0].title,
                    text: event[0].message
                });
            }
        });
    </script>
    @endscript
</section>