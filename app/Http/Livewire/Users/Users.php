<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $name, $email, $roles, $user_id;
    public $isModalOpen = 0;
    public $confirmUserDeletion = false;
    public $search = '';
    public function render()
    {
        return view('livewire.users.users', ['users' => User::where('name', 'like', '%' . $this->search . '%')->orWhere('email', 'like', '%' . $this->search . '%')->latest()->paginate(10)]);
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->resetErrorBag();
        $this->resetValidation();
    }

    private function resetCreateForm()
    {
        $this->user_id = '';
        $this->name = '';
        $this->email = '';
        $this->roles = '';
    }

    public function store()
    {
        $this->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user_id)]
        ]);

        User::updateOrCreate(['id' => $this->user_id], [
            'name' => $this->name,
            'email' => $this->email,
            'roles' => $this->roles,
        ]);
        if (!$this->user_id) {
            $this->resetPage();
        }
        session()->flash('message', $this->user_id ? 'User updated successfully.' : 'Data added successfully.');
        session()->flash('tipe', 'success');

        $this->closeModal();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->roles = $user->roles;

        $this->openModal();
    }

    public function confirmDelete($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->confirmUserDeletion = true;
    }
    public function delete()
    {
        User::find($this->user_id)->delete();
        session()->flash('message', 'User deleted successfully.');
        session()->flash('tipe', 'danger');
        $this->reset();
    }
}
