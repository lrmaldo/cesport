<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    public $users, $name, $email, $role, $user_id, $search = '',$isUpdate = false;

    public function render()
    {
        $this->users = User::where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('email', 'like', '%' . $this->search . '%')
                            ->orWhere('role', 'like', '%' . $this->search . '%')
                            ->with('roles')
                            ->get();
        return view('livewire.users');
    }

    public function save()
    {
      $user =  User::updateOrCreate(['id' => $this->user_id], [
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
        ]);
        $this->user_id ? $user->syncRoles($this->role) : $user->assignRole($this->role);


        $this->resetInputFields();
        $this->user_id ? session()->flash('message', 'User Updated Successfully.') : session()->flash('message', 'User Created Successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
    }

    public function delete($id)
    {
        User::find($id)->delete();
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->role = '';
        $this->user_id = '';
    }
}
