<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function delete(int $id){
        Post::where('id',$id)->delete();
    }

    public function render()
    {
        return view('livewire.posts.index', [
            'posts' => Post::paginate(10)
        ]);
    }
}