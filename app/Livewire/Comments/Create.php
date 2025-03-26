<?php

namespace App\Livewire\Comments;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
class Create extends Component
{
    #[Validate('required|string|min:3')]
    public string $name = '';

    #[Validate('required|string|min:3')]
    public string $content = '';

    #[validate('required|int|exists:posts,id')]
    public string $post_id = '';

    public $posts;

    public function mount()
    {
        $this->posts = Post::all();
    }
    public function save()
    {
        $data = $this->validate();

        Comment::create($data);

        return redirect()->to('/comments')
        ->with('status', 'Comment created!');
    }

    public function render(): View
    {
        return view('livewire.comment.create');
    }

}
