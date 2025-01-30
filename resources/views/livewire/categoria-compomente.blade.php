<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md p-6">
        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('message') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Categorías</h2>
            <button wire:click="create()" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Crear Categoría</button>
        </div>

        @if($isOpen)
            @include('livewire.create-category')
        @endif

        <div class="mb-4">
            <input type="text" wire:model.live="search" placeholder="Buscar..." class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">No.</th>
                    <th class="py-2 px-4 border-b">Nombre</th>
                    <th class="py-2 px-4 border-b">Descripción</th>
                    <th class="py-2 px-4 border-b">Acción</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b">{{ $category->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $category->description }}</td>
                        <td class="py-2 px-4 border-b">
                            <button wire:click="edit({{ $category->id }})" class="bg-yellow-500 text-white px-4 py-2 rounded-lg">Editar</button>
                            <button wire:click="delete({{ $category->id }})" class="bg-red-500 text-white px-4 py-2 rounded-lg">Eliminar</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-2 px-4 border-b text-center">No se encontraron categorías.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
