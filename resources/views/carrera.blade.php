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
      <a href="#register" class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-3 px-6 rounded-full transition transform hover:scale-105">
        ¡Inscríbete Ahora!
      </a>
    </div>
  </header>

  <!-- Carousel Section -->
  <section class="container mx-auto px-6 py-12">
    <div class="slider">
      <div><img src="{{asset('/img/imagen1.webp')}}" alt="Imagen 1" class="w-full h-1/6 object-cover rounded-lg shadow-md"></div>
      <div><img src="{{asset('/img/imagen2.webp')}}" alt="Imagen 2" class="w-full h-1/6 object-cover rounded-lg shadow-md"></div>
      <div><img src="{{asset('/img/imagen3.webp')}}" alt="Imagen 3" class="w-full h-64 object-cover rounded-lg shadow-md"></div>
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

  <!-- Registration Form -->
  <section id="register" class="bg-gray-100 py-12">
    <div class="container mx-auto px-6">
      <h2 class="text-3xl font-bold text-center mb-8">Formulario de Inscripción</h2>
      <form action="/submit" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow-md p-6 max-w-xl mx-auto">
        <div class="mb-4">
          <label for="name" class="block text-gray-600 font-bold mb-2">Nombre Completo</label>
          <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
          <label for="email" class="block text-gray-600 font-bold mb-2">Correo Electrónico</label>
          <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
          <label for="category" class="block text-gray-600 font-bold mb-2">Categoría</label>
          <select id="category" name="category" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="5km">5 km</option>
            <option value="10km">10 km</option>
          </select>
        </div>
        <div class="mb-4">
          <label for="payment" class="block text-gray-600 font-bold mb-2">Captura de Transferencia</label>
          <input type="file" id="payment" name="payment" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 transition w-full">
          Enviar Inscripción
        </button>
      </form>
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
    $(document).ready(function(){
      $('.slider').slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 2000
      });
    });
  </script>
</body>
</html>
