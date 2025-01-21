<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CESport Carrera</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
</head>

<body class="bg-gray-50 font-sans leading-relaxed">

    <!-- Hero Section -->
    <header class="bg-gradient-to-r from-blue-800 to-blue-500 text-white">
        <div class="container mx-auto px-6 py-16 text-center">
            <h1 class="text-4xl font-bold mb-4 animate-bounce">¡Únete a la Carrera CESport 2025!</h1>
            <p class="text-lg mb-6">Corre por la diversión, la salud y grandes premios</p>
            <a href="#register"
                class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-3 px-6 rounded-full transition transform hover:scale-105">
                ¡Inscríbete Ahora!
            </a>
        </div>
    </header>

    <!-- Carousel Section -->
    <section class="container mx-auto px-6 py-12">
        <div class="slider">
            <div><img src="{{ asset('/img/imagen1.webp') }}" alt="Imagen 1"
                    class="w-full h-72 object-cover rounded-lg shadow-md"></div>
            <div><img src="{{ asset('/img/imagen2.webp') }}" alt="Imagen 2"
                    class="w-full h-72 object-cover rounded-lg shadow-md"></div>
            <div><img src="{{ asset('/img/imagen3.webp') }}" alt="Imagen 3"
                    class="w-full h-72 object-cover rounded-lg shadow-md"></div>
        </div>
    </section>

    <!-- Information Section -->
    <section class="container mx-auto px-6 py-12 text-gray-700">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Detalles del Evento</h2>
            <p class="text-lg">¡Participa en nuestra emocionante carrera de 5 km y 10 km!</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <h3 class="text-xl font-bold mb-2">📅 Fecha</h3>
                <p>Domingo, 15 de marzo de 2025</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <h3 class="text-xl font-bold mb-2">📍 Lugar</h3>
                <p>Parque Central, Ciudad</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <h3 class="text-xl font-bold mb-2">🏅 Premios</h3>
                <p>Medallas y premios para los ganadores</p>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="container mx-auto px-6 py-12">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Complementa tu outfit</h2>
            <p class="text-lg">Encuentra los mejores productos para tu carrera</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <img src="{{asset('/img/conjuntomujer.jpg')}}" alt="Conjunto Mujer" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-bold mb-2">Conjunto Mujer</h3>
                <p class="text-gray-700 mb-4">Cómoda y ligera, perfecta para correr.</p>
                <a href="#" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 transition">Comprar</a>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <img src="{{asset('/img/calcetas.jpg')}}" alt="Shorts Deportivos" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-bold mb-2">Calcetas deportivas</h3>
                <p class="text-gray-700 mb-4">Amortiguación y soporte para tus pies.</p>
                <a href="#" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 transition">Comprar</a>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <img src="{{asset('/img/conjuntohombre.jpg')}}" alt="Calcetas Deportivas" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-bold mb-2">Conjunto Hombre</h3>
                <p class="text-gray-700 mb-4">Flexibles y transpirables para mayor comodidad.</p>
                <a href="#" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 transition">Comprar</a>
            </div>
        </div>
    </section>

    <!-- Registration Form -->
    <section id="register" class="bg-gray-100 py-12">
        <div class="container mx-auto px-6">
            <div class="bg-gradient-to-r from-yellow-100 via-yellow-200 to-yellow-100 border-l-4 border-yellow-500 text-yellow-800 p-6 mb-8 rounded-lg shadow-md"
                role="alert">
                <h2 class="font-extrabold text-lg mb-3 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-yellow-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m0-4h.01M12 20h.01M12 16h.01M12 12h.01M12 8h.01" />
                    </svg>
                    Pasos para hacer la transferencia
                </h2>
                <ol class="list-decimal list-inside space-y-2 pl-4">
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m0 0a9 9 0 11-6.001-2.999L13 7m4-1a9 9 0 00-5-8.001" />
                        </svg>
                        Realiza la transferencia a la cuenta bancaria XYZ.
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m0 0a9 9 0 11-6.001-2.999L13 7m4-1a9 9 0 00-5-8.001" />
                        </svg>
                        Asegúrate de poner tu <span class="font-semibold text-yellow-700">nombre completo</span> en el
                        concepto de la transferencia.
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m0 0a9 9 0 11-6.001-2.999L13 7m4-1a9 9 0 00-5-8.001" />
                        </svg>
                        Guarda una captura de la transferencia para subirla en el formulario de inscripción.
                    </li>
                </ol>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                <h3 class="text-center text-xl font-bold text-gray-800 mb-4">Detalles de la cuenta bancaria</h3>
                <div class="flex items-center justify-center">
                    <div
                        class="w-80 h-40 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg relative overflow-hidden shadow-lg">
                        <!-- Nombre del banco -->
                        <div class="absolute top-4 left-4 text-white text-lg font-bold uppercase tracking-wide">Banco
                            BBVA</div>

                        <!-- Nombre del titular centrado -->
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-white text-2xl font-bold tracking-wider">Cesar Eugenio</div>
                        </div>

                        <!-- Número de cuenta -->
                        <div class="absolute bottom-6 left-4 text-white text-2xl font-bold tracking-wider">
                            1234 5678 9012 3456
                        </div>
                    </div>
                </div>

            </div>

            <h2 class="text-3xl font-bold text-center mb-8">Formulario de Inscripción</h2>
            <form action="/submit" method="POST" enctype="multipart/form-data"
                class="bg-white rounded-lg shadow-md p-6 max-w-xl mx-auto">
                <div class="mb-4">
                    <label for="name" class="block text-gray-600 font-bold mb-2">Nombre Completo</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-600 font-bold mb-2">Correo Electrónico</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="mb-4">
                    <label for="category" class="block text-gray-600 font-bold mb-2">Categoría</label>
                    <select id="category" name="category"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="5km">5 km</option>
                        <option value="10km">10 km</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="size" class="block text-gray-600 font-bold mb-2">Talla de Playera</label>
                    <select id="size" name="size"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                    <span class="text-gray-500 text-sm">50 playeras disponibles a elegir, después de las 50 es
                        dependiendo del proveedor.</span>
                </div>
                <div class="mb-4">
                    <label for="payment" class="block text-gray-600 font-bold mb-2">Captura de Transferencia</label>
                    <input type="file" id="payment" name="payment"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <button type="submit"
                    class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 transition w-full">
                    Enviar Inscripción
                </button>
            </form>
        </div>
    </section>

    <!-- Sponsors Section -->
    <section class="container mx-auto px-6 py-12">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Patrocinadores</h2>
            <p class="text-lg">Agradecemos a nuestros patrocinadores por su apoyo</p>
        </div>
        <div class="slider-sponsors">
            <div class="flex items-center justify-center">
                <img src="{{asset('/img/patrocinador1.png')}}" alt="Patrocinador 1" class="h-24 object-contain">
            </div>
            <div class="flex items-center justify-center">
                <img src="{{asset('/img/patrocinador2.png')}}" alt="Patrocinador 2" class="h-24 object-contain">
            </div>
            <div class="flex items-center justify-center">
                <img src="{{asset('/img/patrocinador3.png')}}" alt="Patrocinador 3" class="h-24 object-contain">
            </div>
            <div class="flex items-center justify-center">
                <img src="{{asset('/img/patrocinador4.png')}}" alt="Patrocinador 4" class="h-24 object-contain">
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 CESport. Todos los derechos reservados.</p>
            <div class="mt-4">
                <a href="#" class="text-yellow-400 hover:text-yellow-500 mx-2">Facebook</a>
                <a href="#" class="text-yellow-400 hover:text-yellow-500 mx-2">Instagram</a>
                <a href="#" class="text-yellow-400 hover:text-yellow-500 mx-2">Twitter</a>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.slider').slick({
                dots: true,
                infinite: true,
                speed: 500,
                slidesToShow: 1,
                adaptiveHeight: true,
                autoplay: true,
                autoplaySpeed: 2000
            });

            $('.slider-sponsors').slick({
                dots: false,
                infinite: true,
                speed: 500,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>
</body>

</html>
