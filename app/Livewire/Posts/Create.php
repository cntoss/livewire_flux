<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use App\Models\Task;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    #[Validate('required|string|min:3')]
    public string $title = '';

    #[Validate('required|string|min:3')]
    public string $description = '';

    public function save(): void
    {
        $data = $this->validate();

        Post::create($data);

        $this->redirectRoute('posts.index');
    }

    public function render(): View
    {
        return view('livewire.posts.create');
    }
}