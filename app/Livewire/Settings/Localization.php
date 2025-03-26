<?php

namespace App\Livewire\Settings;

use Livewire\Component;

class Localization extends Component
{
    public $locale;

    public function mount(): void
    {
        $this->locale = session('locale', config('app.locale'));
    }

    public function save()
    {
        session()->put('locale', $this->locale);
        app()->setLocale($this->locale);
        $this->dispatch('localization-updated', [
            'title' => 'Success!',
            'message' => 'Your localization settings have been updated.',
            'type' => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.settings.localization');
    }
}
