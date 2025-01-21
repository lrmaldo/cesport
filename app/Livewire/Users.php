<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    public $users, $name, $email, $role, $password, $user_id, $search = '', $isUpdate = false;


    public function render()
    {
        $users = User::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhereHas('roles', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->with('roles')
            ->get();

        return view('livewire.users', ['usersdb' => $users]);
    }



    public function save()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => $this->user_id ? 'nullable|min:6' : 'required|min:6',
        ]);

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
        ];

        if ($this->password) {
            $data['password'] = Hash::make($this->password);
        }

        $user = User::updateOrCreate(['id' => $this->user_id], $data);

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
        $this->role = $user->roles->pluck('name')[0];
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
        $this->password = '';
        $this->user_id = '';
    }
}
