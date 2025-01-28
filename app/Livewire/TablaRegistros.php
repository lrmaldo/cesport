<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Registro;

class TablaRegistros extends Component
{
    use WithPagination;

    public $search = '';

    protected $updatesQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {


        $registros = Registro::where('nombre_completo', 'like', '%' . $this->search . '%')
            ->orWhere('correo_electronico', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.tabla-registros', compact('registros'));
    }
}
