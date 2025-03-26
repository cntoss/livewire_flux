<?php

namespace App\Livewire\Comments;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function delete(int $id){
        Comment::where('id',$id)->delete();
    }

    public function render()
    {
        return view('livewire.comment.index', [
            'comments' => Comment::paginate(10)
        ]);
    }
}