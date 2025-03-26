<?php

namespace App\Livewire\Comments;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    #[Validate('required|string')]
    public string $name = '';

    #[Validate('required|string')]
    public string $content = '';
    #[validate('required|int|exists:posts,id')]
    public string $post_id = '';

    public $posts = [];

    public Comment $comment;

    public function mount(Comment $comment): void
    {
        $this->comment = $comment;
        $this->name = $comment->name;
        $this->content = $comment->content;
        $this->post_id = $comment->post_id;
        $this->posts = Post::all();
    }

    public function save(): void
    {
        $data = $this->validate();

        $this->comment->update($data);

        $this->redirectRoute('comments.index');
    }

    public function render(): View
    {
        return view('livewire.comment.edit');
    }
}