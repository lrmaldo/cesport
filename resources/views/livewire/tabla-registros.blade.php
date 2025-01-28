<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
        <div class="container mx-auto px-6 py-12">
            <h1 class="text-3xl font-bold mb-6 text-center text-gray-800 dark:text-gray-200">Registros Detallados</h1>

            <div class="mb-6">
                <input type="text" wire:model="search" placeholder="Buscar por nombre o correo"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <h1>{{$search}}</h1>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="py-3 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Nombre Completo</th>
                            <th class="py-3 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Teléfono</th>
                            <th class="py-3 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Correo Electrónico</th>
                            <th class="py-3 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Categoría</th>
                            <th class="py-3 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Género</th>
                            <th class="py-3 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Número de Corredor</th>
                            <th class="py-3 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Talla de Playera</th>
                            <th class="py-3 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Captura</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($registros as $registro)
                            <tr>
                                <td class="py-2 px-4 text-sm text-gray-900 dark:text-gray-200">{{ $registro->nombre_completo }}</td>
                                <td class="py-2 px-4 text-sm text-gray-900 dark:text-gray-200">{{ $registro->telefono }}</td>
                                <td class="py-2 px-4 text-sm text-gray-900 dark:text-gray-200">{{ $registro->correo_electronico }}</td>
                                <td class="py-2 px-4 text-sm text-gray-900 dark:text-gray-200">{{ $registro->categoria }}</td>
                                <td class="py-2 px-4 text-sm text-gray-900 dark:text-gray-200">{{ $registro->genero }}</td>
                                <td class="py-2 px-4 text-sm text-gray-900 dark:text-gray-200">{{ $registro->numero_corredor }}</td>
                                <td class="py-2 px-4 text-sm text-gray-900 dark:text-gray-200">{{ $registro->talla_playera }}</td>
                                <td class="py-2 px-4 text-sm">
                                    <a href="{{ asset('storage/' . $registro->captura_transferencia) }}" target="_blank" class="text-blue-500 hover:underline">Ver Captura</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="py-4 text-center text-gray-500 dark:text-gray-400">No hay registros disponibles.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $registros->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</div>
