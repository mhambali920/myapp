<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;

    public $title, $description, $post_id;
    public $isModalOpen = 0;
    public $search = '';

    public function render()
    {
        return view('livewire.posts', ['posts' => Post::where('title', 'like', '%' . $this->search . '%')->orWhere('description', 'like', '%' . $this->search . '%')->latest()->paginate(5)]);
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm()
    {
        $this->title = '';
        $this->description = '';
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Post::updateOrCreate(['id' => $this->post_id], [
            'title' => $this->title,
            'description' => $this->description,
        ]);
        if (!$this->post_id) {
            $this->resetPage();
        }
        session()->flash('message', $this->post_id ? 'Data updated successfully.' : 'Data added successfully.');
        session()->flash('tipe', 'success');

        $this->closeModal();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->title = $post->title;
        $this->description = $post->description;

        $this->openModal();
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Data deleted successfully.');
        session()->flash('tipe', 'danger');
    }
}
