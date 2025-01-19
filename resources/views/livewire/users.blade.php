<div class="flex justify-center items-center min-h-screen bg-gray-100 px-4">
    <div class="w-full max-w-7xl p-6 bg-white rounded-lg shadow-lg">
        {{-- Formulario para añadir usuarios --}}
        <form wire:submit.prevent="save" class="mb-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <input type="text" wire:model="name" placeholder="Nombre"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-600">
                </div>
                <div>
                    <input type="email" wire:model="email" placeholder="Correo Electrónico"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-600">
                </div>
                <div>
                    <select wire:model="role"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-600">
                        <option value="">Seleccionar Rol</option>
                        <option value="administrador">Administrador</option>
                        <option value="organizador">Organizador</option>
                    </select>
                </div>
            </div>
            <button type="submit"
                class="mt-4 w-full md:w-auto px-6 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-400">
                Guardar
            </button>
        </form>

        {{-- Buscador de usuarios --}}
        <div class="mb-4">
            <input type="text" wire:model="search" placeholder="Buscar usuarios..."
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-600">
        </div>

        {{-- Tabla de usuarios --}}
        <div class="overflow-x-auto">
            <table class="w-full border-collapse bg-white shadow-md rounded-lg">
                <thead class="bg-primary-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Correo Electrónico</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Rol</th>
                        <th class="px-6 py-3 text-center text-sm font-semibold">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ implode(', ', $user->roles->pluck('name')->toArray()) }}</td>
                            <td class="px-6 py-4 text-center">
                                <button wire:click="edit({{ $user->id }})"
                                    class="px-4 py-2 bg-accent-500 text-white text-sm font-medium rounded-lg shadow hover:bg-accent-600 focus:outline-none focus:ring-2 focus:ring-accent-400">
                                    Editar
                                </button>
                                <button wire:click="delete({{ $user->id }})"
                                    class="ml-2 px-4 py-2 bg-secondary-500 text-white text-sm font-medium rounded-lg shadow hover:bg-secondary-600 focus:outline-none focus:ring-2 focus:ring-secondary-400">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
