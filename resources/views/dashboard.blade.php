<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard de Registros') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Mensajes Flash -->
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Contenedor de Estadísticas -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Total de Registros -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md text-center">
                    <h3 class="text-lg font-bold text-gray-700 dark:text-gray-200">Total de Registros</h3>
                    <p class="text-3xl font-bold text-blue-500">{{ $totalRegistros }}</p>
                </div>

                <!-- Total de Hombres -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md text-center">
                    <h3 class="text-lg font-bold text-gray-700 dark:text-gray-200">Hombres Registrados</h3>
                    <p class="text-3xl font-bold text-green-500">{{ $totalHombres }}</p>
                </div>

                <!-- Total de Mujeres -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md text-center">
                    <h3 class="text-lg font-bold text-gray-700 dark:text-gray-200">Mujeres Registradas</h3>
                    <p class="text-3xl font-bold text-pink-500">{{ $totalMujeres }}</p>
                </div>

                <!-- Otra Estadística (Opcional) -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md text-center">
                    <h3 class="text-lg font-bold text-gray-700 dark:text-gray-200">Tallas Pendientes</h3>
                    <p class="text-3xl font-bold text-yellow-500">{{ $totalTallasPendientes }}</p>
                </div>
            </div>

            <!-- Contenedor de Gráfica -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md mb-6">
                <h3 class="text-lg font-bold text-gray-700 dark:text-gray-200 mb-4">Distribución por Género</h3>
                <canvas id="registrosChart" style="height: 160px; width: 100%;"></canvas>

            </div>

            <style>
                #registrosChart {
                    height: 160px !important;
                }
            </style>

            <!-- Contenedor de Tabla -->
            <div class="container mx-auto p-4">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-bold text-gray-700 dark:text-gray-200 mb-4">Lista de Registros</h3>
                    <div class="overflow-x-auto">
                        <table id="datatable" class="min-w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="bg-blue-500 text-white">
                                <tr>
                                    <th class="px-4 py-2">Nombre</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Género</th>
                                    <th class="px-4 py-2">Talla</th>
                                    <th class="px-4 py-2">Categoria</th>
                                    <th class="px-4 py-2">Captura transferencia</th>
                                    <th class="px-4 py-2">Fecha de Registro</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Los datos serán llenados dinámicamente por DataTables -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div id="imageModal" tabindex="-1" aria-hidden="true" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Captura de Transferencia
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="closeModal()">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 01-1.414-1.414L8.586 10 4.293 5.707a1 1 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-6 space-y-6">
                    <img id="modalImage" src="" alt="Captura de Transferencia" class="w-full h-auto">
                </div>
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button type="button" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="closeModal()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>

</x-app-layout>


<script>
    // Gráfica de Registros
    var ctx = document.getElementById('registrosChart').getContext('2d');
    var registrosChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Hombres', 'Mujeres'],
        datasets: [{
            label: 'Registros por Género',
            data: [{{ $totalHombres }}, {{ $totalMujeres }}],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
    });

    // Inicialización del DataTable
    /*  $(document).ready(function () {
        $('#datatable').DataTable({
            serverSide: true,
            processing: true,
            ajax: "{{ route('getData') }}",
            columns: [
                { data: 'nombre', name: 'nombre' },
                { data: 'email', name: 'email' },
                { data: 'genero', name: 'genero' },
                { data: 'talla', name: 'talla' },
                { data: 'created_at', name: 'created_at' }
            ],
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/es-MX.json' // Traducción al español
            }
        });
    }); */


    // Inicialización del DataTable



    document.addEventListener("DOMContentLoaded", function() {
        fetch("/getData")
            .then((response) => response.json())
            .then((data) => {
                const processedData = data.data.map((registro) => [
                    registro.nombre_completo??'',
                    registro.correo_electronico??'',
                    registro.genero??'',
                    registro.talla??'',
                    registro.categoria??'',
                    registro.captura_transferencia??'', // Aquí se puede colocar un enlace a la imagen
                    registro.created_at,
                ]);

                const headings = ["Nombre", "Email", "Género", "Talla","Categoria", "Captura transferencia", "Fecha de Registro"];

                const datatable = new simpleDatatables.DataTable("#datatable", {
                    data: {
                        headings: headings,
                        data: processedData,
                    },
                    layout: {
                        top: `
                            <div class="flex flex-col lg:flex-row justify-between items-center">
                                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Lista de Registros</h2>
                            </div>
                        `,
                    },
                    labels: {
                        placeholder: "Buscar...",
                    noRows: "No se encontraron registros",
                    info: "Mostrando {start} a {end} de {rows} registros (Página {page} de {pages})",
                    perPage: "Registros por página",
                    },
                });

            });
    });

    function showModal(imageUrl) {
        document.getElementById('modalImage').src = imageUrl;
        document.getElementById('imageModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('imageModal').classList.add('hidden');
    }
</script>
