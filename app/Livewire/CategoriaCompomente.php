<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Categoria;

class CategoriaCompomente extends Component
{
    public  $name, $description, $category_id;
    public $isOpen = 0;
    public $search = '';


    public function getCategoriesProperty()
    {
        return Categoria::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->get();
    }
    public function updatedSearch()
    {
        $this->dispatch('refresh');// 🔥 Hace que la búsqueda en tiempo real funcione
    }


    public function render()
    {

        return view('livewire.categoria-compomente', [
            'categories' => $this->categories
        ])->layout('layouts.app');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
        $this->category_id = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        Categoria::updateOrCreate(['id' => $this->category_id], [
            'name' => $this->name,
            'description' => $this->description,
        ]);

        session()->flash('message',
            $this->category_id ? 'Category Updated Successfully.' : 'Category Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $category = Categoria::findOrFail($id);
        $this->category_id = $id;
        $this->name = $category->name;
        $this->description = $category->description;

        $this->openModal();
    }

    public function delete($id)
    {
        Categoria::find($id)->delete();
        session()->flash('message', 'Category Deleted Successfully.');
    }
}
