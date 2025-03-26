<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Auth;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    #[Validate('required|string')]
    public string $title = '';

    #[Validate('required|string')]
    public string $description = '';

    public Post $post;

    public function mount(?Post $post)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        if (!$post) {
            abort(404); // Handle missing post properly
        }
        $this->post = $post;
        $this->title = $post->title;
        $this->description = $post->description;
    }

    public function save(): void
    {
        $data = $this->validate();

        $this->post->update($data);

        $this->redirectRoute('posts.index');
    }

    public function render(): View
    {
        return view('livewire.posts.edit');
    }
}