<?php

namespace App\Livewire\Tasks;

use App\Models\Post;
use App\Models\Task;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    #[Validate('required|string')]
    public string $title = '';

    #[Validate('required|string')]
    public string $description = '';

    public Post $task;

    public function mount(Post $task): void
    {
        $this->task = $task;
        $this->title = $task->title;
        $this->description = $task->description;
    }

    public function save(): void
    {
        $data = $this->validate();

        $this->task->update($data);

        $this->redirectRoute('tasks.index');
    }

    public function render(): View
    {
        return view('livewire.tasks.edit');
    }
}