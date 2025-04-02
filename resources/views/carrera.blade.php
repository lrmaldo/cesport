<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CESport Carrera</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .hero-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .carousel-card {
            transition: all 0.3s ease;
            overflow: hidden;
        }
        .carousel-card img {
            transition: transform 0.5s ease;
        }
        .carousel-card:hover img {
            transform: scale(1.05);
        }
        .slick-dots li button:before {
            font-size: 12px;
            color: #3B82F6;
        }
        .slick-dots li.slick-active button:before {
            color: #1D4ED8;
        }
        .pulse-btn {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(250, 204, 21, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(250, 204, 21, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(250, 204, 21, 0);
            }
        }
    </style>

<script src="https://sdk.mercadopago.com/js/v2"></script>
</head>

<body class="bg-gray-50 font-sans leading-relaxed">

    <!-- Hero Section -->
    <header class="relative overflow-hidden">
        <!-- Fondo con gradiente y patrón -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900 via-blue-700 to-indigo-800 hero-pattern"></div>

        <!-- Formas decorativas -->
        <div class="absolute top-20 right-10 w-32 h-32 bg-yellow-400 rounded-full opacity-20 blur-xl"></div>
        <div class="absolute bottom-10 left-10 w-48 h-48 bg-blue-400 rounded-full opacity-20 blur-xl"></div>

        <div class="container mx-auto px-6 py-24 relative z-10">
            <div class="max-w-2xl mx-auto text-center">
                <span class="inline-block px-4 py-1 rounded-full bg-blue-400 bg-opacity-20 text-blue-100 backdrop-blur-sm mb-6 transform hover:scale-105 transition">Evento 2025</span>
                <h1 class="text-5xl md:text-6xl font-bold mb-6 text-white tracking-tight">
                    ¡Únete a la Carrera <span class="text-yellow-400">CESport 2025</span>!
                </h1>
                <p class="text-xl text-blue-100 mb-10 leading-relaxed">Vive la experiencia única de correr por la diversión, la salud y grandes premios</p>
                <a href="#register"
                   class="pulse-btn inline-flex items-center justify-center bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-4 px-8 rounded-full transition transform hover:-translate-y-1 hover:shadow-xl">
                   <span>¡Inscríbete Ahora!</span>
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                   </svg>
                </a>

                <!-- Indicadores -->
                <div class="mt-8 flex flex-wrap justify-center gap-6">
                    <div class="text-center p-4 bg-white bg-opacity-10 rounded-lg backdrop-filter backdrop-blur-sm transform transition hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        <span class="block text-3xl font-bold text-white mt-1">5K</span>
                        <span class="text-blue-200 text-sm">Distancia</span>
                    </div>
                    <div class="text-center p-4 bg-white bg-opacity-10 rounded-lg backdrop-filter backdrop-blur-sm transform transition hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        <span class="block text-3xl font-bold text-white mt-1">10K</span>
                        <span class="text-blue-200 text-sm">Distancia</span>
                    </div>
                    <div class="text-center p-4 bg-white bg-opacity-10 rounded-lg backdrop-filter backdrop-blur-sm transform transition hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="block text-3xl font-bold text-white mt-1">15 Mar</span>
                        <span class="text-blue-200 text-sm">Fecha</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Onda inferior -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full h-auto">
                <path fill="#F9FAFB" fill-opacity="1" d="M0,160L48,170.7C96,181,192,203,288,208C384,213,480,203,576,176C672,149,768,107,864,96C960,85,1056,107,1152,117.3C1248,128,1344,128,1392,128L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </header>

    <!-- Carousel Section -->
    <section class="container mx-auto px-6 py-20">
        <div class="text-center mb-12">
            <span class="inline-block px-3 py-1 text-sm font-medium text-blue-700 bg-blue-100 rounded-full">MOMENTOS</span>
            <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-2 text-gray-800">Galería de Imágenes</h2>
            <div class="w-16 h-1 bg-yellow-400 mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-lg mx-auto">Revive los increíbles momentos de nuestras carreras anteriores y prepárate para crear nuevos recuerdos</p>
        </div>

        <div class="max-w-5xl mx-auto">
            <div class="slider">
                <div class="p-3">
                    <div class="carousel-card relative group rounded-xl overflow-hidden shadow-lg">
                        <img src="{{ asset('/img/imagen1.webp') }}" alt="Imagen 1"
                            class="w-full h-96 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-70 transition-opacity duration-300"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-8 group-hover:translate-y-0 transition-transform duration-300">
                            <h3 class="text-xl font-bold">Carrera 2024</h3>
                            <p class="text-sm text-gray-200">Una jornada llena de energía y superación</p>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <div class="carousel-card relative group rounded-xl overflow-hidden shadow-lg">
                        <img src="{{ asset('/img/imagen2.webp') }}" alt="Imagen 2"
                            class="w-full h-96 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-70 transition-opacity duration-300"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-8 group-hover:translate-y-0 transition-transform duration-300">
                            <h3 class="text-xl font-bold">Llegada a meta</h3>
                            <p class="text-sm text-gray-200">El momento que corona todo el esfuerzo</p>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <div class="carousel-card relative group rounded-xl overflow-hidden shadow-lg">
                        <img src="{{ asset('/img/imagen3.webp') }}" alt="Imagen 3"
                            class="w-full h-96 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-70 transition-opacity duration-300"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-8 group-hover:translate-y-0 transition-transform duration-300">
                            <h3 class="text-xl font-bold">Espíritu deportivo</h3>
                            <p class="text-sm text-gray-200">Compañerismo y apoyo mutuo en cada kilómetro</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-8">
                <a href="#" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                    Ver todas las fotos
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function(){
            $('.slider').slick({
                dots: true,
                arrows: true,
                infinite: true,
                speed: 500,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                adaptiveHeight: true,
                prevArrow: '<button type="button" class="slick-prev">Previous</button>',
                nextArrow: '<button type="button" class="slick-next">Next</button>',
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: false
                        }
                    }
                ]
            });

            // Also initialize sponsor slider
            $('.slider-sponsors').slick({
                dots: false,
                arrows: false,
                infinite: true,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        });
    </script>

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
            <form id="registrationForm" action="/summit-registro" method="POST" enctype="multipart/form-data"
                class="bg-white rounded-lg shadow-md p-6 max-w-xl mx-auto">
                @csrf
                <div class="mb-4">
                    <label for="nombre_completo" class="block text-gray-600 font-bold mb-2">Nombre Completo</label>
                    <input type="text" id="nombre_completo" name="nombre_completo"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required pattern="[A-Za-z\s]+" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\b\w/g, l => l.toUpperCase());">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-600 font-bold mb-2">Correo Electrónico</label>
                    <input type="email" id="correo_electronico" name="correo_electronico"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" oninput="validateEmail()">
                    <span id="emailError" class="text-red-500 text-sm hidden">Correo electrónico no válido</span>
                    <span id="emailValid" class="text-green-500 text-sm hidden">Correo electrónico válido</span>
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                {{-- telefono --}}
                <div class="mb-4">
                    <label for="telefono" class="block text-gray-600 font-bold mb-2">Teléfono</label>
                    <input type="text" id="telefono" name="telefono"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required pattern="\d{10}" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);">
                    @error('telefono')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="categoria" class="block text-gray-600 font-bold mb-2">Categoría</label>
                    <select id="categoria" name="categoria"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="5km">5km</option>
                        <option value="10km">10km</option>
                    </select>
                    @error('categoria')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                {{-- genero --}}
                <div class="mb-4">
                    <label for="genero" class="block text-gray-600 font-bold mb-2">Género</label>
                    <select id="genero" name="genero"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="varonil">Varonil</option>
                        <option value="femenil">Femenil</option>
                    </select>
                    @error('genero')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="talla_playera" class="block text-gray-600 font-bold mb-2">Talla de Playera</label>
                    @if ($conteo >= 50)
                        <select id="talla_playera" name="talla_playera" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="NO_DISPONIBLE">No disponible</option>
                        </select>
                        <span class="text-blue-500 text-sm">Lo sentimos, ya no hay tallas para elegir. Las playeras se asignarán dependiendo de la disponibilidad del proveedor.</span>
                    @else
                        <select id="talla_playera" name="talla_playera" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="" disabled selected>Elige tu talla</option>
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                        </select>
                        <span class="text-green-500 text-sm">{{50 -$conteo}} playeras disponibles a elegir, después de las 50 es dependiendo del proveedor.</span>
                    @endif
                    @error('talla_playera')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-gray-600 font-bold mb-2">Método de pago</label>
                    <input type="hidden" name="payment_method" id="payment_method" value="transferencia">

                    <div class="flex space-x-4">
                        <button type="button" id="transferencia-btn"
                            class="flex-1 bg-blue-500 text-white font-bold py-2 px-4 rounded-lg transition flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            Transferencia Bancaria
                        </button>
                        <button type="button" id="mercadopago-btn"
                            class="flex-1 bg-blue-500 text-white font-bold py-2 px-4 rounded-lg transition flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Mercado Pago
                        </button>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">
                        <span class="font-medium">Transferencia:</span> Sube tu comprobante manualmente.
                        <br>
                        <span class="font-medium">Mercado Pago:</span> Paga con tarjeta, efectivo o saldo de MP.
                    </p>
                </div>

                <div id="paymentProofSection" class="mb-4">
                    <label for="payment" class="block text-gray-600 font-bold mb-2">Captura de Transferencia</label>
                    <input type="file" id="payment" name="payment"
                           accept="image/*,application/pdf"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           required>
                    @error('payment')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button id="submitButton"
                    class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 transition w-full">
                    Enviar Inscripción
                </button>
                <div id="loadingMessage" class="hidden text-center mt-4">
                    <div id="lottie-animation" style="width: 100px; height: 100px;" class="mx-auto"></div>
                    <p class="text-blue-500">Enviando inscripción, por favor espera...</p>
                </div>
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

    <div id="fullScreenContainer" class="fixed inset-0 bg-gradient-to-r from-blue-800 to-blue-500 bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div id="lottie-animation-fullscreen" style="width: 300px; height: 300px;"></div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.6/lottie.min.js"></script>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Botones de método de pago
            const transferBtn = document.getElementById('transferencia-btn');
            const mpBtn = document.getElementById('mercadopago-btn');
            const paymentMethodInput = document.getElementById('payment_method');
            const paymentProofSection = document.getElementById('paymentProofSection');

            // Selecciona transferencia por defecto
            transferBtn.classList.add('bg-green-600');

            transferBtn.addEventListener('click', function() {
                paymentMethodInput.value = 'transferencia';
                transferBtn.classList.add('bg-green-600');
                mpBtn.classList.remove('bg-green-600');
                mpBtn.classList.add('bg-blue-500');
                paymentProofSection.classList.remove('hidden');
                document.getElementById('payment').required = true;
            });

            mpBtn.addEventListener('click', function() {
                // Validar primero el formulario
                const nombre = document.getElementById('nombre_completo').value;
                const correo = document.getElementById('correo_electronico').value;
                const telefono = document.getElementById('telefono').value;
                const categoria = document.getElementById('categoria').value;
                const genero = document.getElementById('genero').value;
                const talla = document.getElementById('talla_playera').value;

                if (!nombre || !correo || !telefono || !categoria || !genero || !talla) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Campos incompletos',
                        text: 'Por favor completa todos los campos del formulario antes de proceder al pago',
                        confirmButtonText: 'Entendido'
                    });
                    return;
                }

                paymentMethodInput.value = 'mercadopago';
                transferBtn.classList.remove('bg-green-600');
                transferBtn.classList.add('bg-blue-500');
                mpBtn.classList.add('bg-green-600');
                paymentProofSection.classList.add('hidden');
                document.getElementById('payment').required = false;

                // Datos para crear la preferencia
                const formData = new FormData();
                formData.append('nombre', nombre);
                formData.append('correo', correo);
                formData.append('telefono', telefono);
                formData.append('categoria', categoria);
                formData.append('genero', genero);
                formData.append('talla', talla);
                formData.append('_token', document.querySelector('input[name="_token"]').value);

                // Mostrar cargando
                fullScreenContainer.classList.remove('hidden');

                // Crear preferencia de pago
                fetch('/mercadopago/crear-preferencia', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    fullScreenContainer.classList.add('hidden');
                    if (data.success) {
                        window.location.href = data.init_point;
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.message || 'Ocurrió un error al crear el pago',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                })
                .catch(error => {
                    fullScreenContainer.classList.add('hidden');
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ocurrió un error al procesar el pago. Por favor intenta de nuevo.',
                        confirmButtonText: 'Aceptar'
                    });
                });
            });

            // Resto del código existente para el formulario...
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Selecciona el formulario
            const form = document.getElementById('registrationForm');
            const submitButton = document.getElementById('submitButton');
            const fullScreenContainer = document.getElementById('fullScreenContainer');

            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Previene la recarga de la página

                // Muestra el mensaje de carga
                fullScreenContainer.classList.remove('hidden');
                submitButton.classList.add('hidden');

                // Recoge los datos del formulario
                const formData = new FormData(form);

                // Envía los datos con fetch
                fetch('/summit-registro', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // Oculta el mensaje de carga después de un tiempo
                    setTimeout(() => {
                        fullScreenContainer.classList.add('hidden');
                        submitButton.classList.remove('hidden');

                        // Redirige a la vista de confirmación con el número de corredor
                        if (data.success) {
                            window.location.href = `/confirmacion/${data.numero_corredor}`;
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: '¡Error en el Registro!',
                                text: data.message || 'Ocurrió un error al procesar tu inscripción. Por favor intenta de nuevo.',
                                confirmButtonText: 'Aceptar'
                            });
                        }
                    }, 3000); // Duración de la animación en milisegundos
                })
                .catch(error => {
                    // Manejo de errores
                    setTimeout(() => {
                        fullScreenContainer.classList.add('hidden');
                        submitButton.classList.remove('hidden');
                        Swal.fire({
                            icon: 'error',
                            title: '¡Error en el Registro!',
                            text: 'Ocurrió un error al procesar tu inscripción. Por favor intenta de nuevo.',
                            confirmButtonText: 'Aceptar'
                        });
                        console.error('Error:', error);
                    }, 3000); // Duración de la animación en milisegundos
                });
            });

            // Inicializar Lottie
            lottie.loadAnimation({
                container: document.getElementById('lottie-animation-fullscreen'),
                renderer: 'svg',
                loop: true,
                autoplay: true,
                path: 'https://lottie.host/b7cfc1de-b929-450c-a037-dd958ec7b068/0x5ZZbzlcx.json' // URL del archivo Lottie
            });
        });

        function validateEmail() {
            const emailInput = document.getElementById('correo_electronico');
            const emailError = document.getElementById('emailError');
            const emailValid = document.getElementById('emailValid');
            const emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;

            if (emailPattern.test(emailInput.value)) {
                emailError.classList.add('hidden');
                emailValid.classList.remove('hidden');
            } else {
                emailError.classList.remove('hidden');
                emailValid.classList.add('hidden');
            }
        }
    </script>

</body>

</html>
