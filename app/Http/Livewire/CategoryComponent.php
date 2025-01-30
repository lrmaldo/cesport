<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;

class CategoryComponent extends Component
{
    public $categories, $name, $description, $category_id;
    public $isOpen = 0;

    public function render()
    {
        $this->categories = Categoria::all();
        return view('livewire.categories')->layout('layouts.app');
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
        $category = Category::findOrFail($id);
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
