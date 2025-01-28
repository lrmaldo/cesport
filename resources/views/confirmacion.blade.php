<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Registro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.6/lottie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js"></script>
</head>

<body class="bg-gray-50 font-sans leading-relaxed">
    <!-- Animación Lottie (solo visible al inicio) -->

    <!-- Contenido principal -->
    <div class="container mx-auto px-6 py-16 text-center " id="main-content">
        <div class="bg-white p-6 rounded-lg shadow-lg inline-block">
            <h1 class="text-4xl font-bold mb-4 text-blue-800">¡Registro Exitoso!</h1>
            <p class="text-lg mb-6 text-gray-700">Tu número de corredor es:</p>
            <div class="bg-gray-200 p-4 rounded-lg shadow-md inline-block">
                <span id="numero-corredor" class="text-4xl font-bold text-blue-800"></span>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener el número de corredor (ejemplo con el valor de la URL o estático si no hay valor)
            const numeroCorredor = window.location.pathname.split('/').pop() || '0001';
            document.getElementById('numero-corredor').textContent = numeroCorredor;

            // Inicializar Lottie
            const lottieInstance = lottie.loadAnimation({
                container: document.getElementById('lottie-animation-confirmation'),
                renderer: 'svg',
                loop: true,
                autoplay: true,
                path: 'https://lottie.host/b7cfc1de-b929-450c-a037-dd958ec7b068/0x5ZZbzlcx.json' // URL del archivo Lottie
            });

            // Lanzar confeti cuando aparece la animación inicial
            setTimeout(() => {
                confetti({
                    particleCount: 150,
                    spread: 90,
                    origin: { y: 0.6 }
                });
            }, 1000);


        });
    </script>
</body>

</html>
