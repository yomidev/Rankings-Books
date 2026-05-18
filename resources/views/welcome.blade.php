<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Readify - Expande tu mente leyendo un libro. Plataforma de lectura y crecimiento personal.">
    <title>Readify | Tu próxima aventura literaria</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        /* Transiciones suaves para el menú móvil */
        .mobile-menu {
            transition: transform 0.2s ease-in-out, opacity 0.2s ease-in-out;
            transform-origin: top;
        }
        .mobile-menu.hidden {
            transform: scaleY(0);
            opacity: 0;
            display: none;
        }
        .mobile-menu:not(.hidden) {
            transform: scaleY(1);
            opacity: 1;
            display: block;
        }
    </style>
</head>
<body class="antialiased font-sans">

    <header class="sticky top-0 z-50">
        <nav class="bg-white/90 backdrop-blur-md border-b border-gray-200 dark:bg-gray-900/90 dark:border-gray-700 shadow-sm">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse" aria-label="Readify inicio">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 w-auto" alt="Readify Logo" />
                    <span class="self-center text-2xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent dark:from-blue-400 dark:to-indigo-400">Readify</span>
                </a>

                <!-- Botón menú móvil -->
                <button id="menu-btn" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu" aria-expanded="false" aria-label="Abrir menú">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>

                <!-- Menú escritorio -->
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                        <li>
                            <a href="{{ route('login') }}" class="block py-2 px-3 text-white bg-blue-700 rounded-lg md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500 transition-colors duration-200 hover:bg-blue-800 md:hover:bg-transparent md:hover:text-blue-800">Iniciar Sesión</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="block py-2 px-3 text-gray-900 rounded-lg hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent transition-colors duration-200">Registrarse</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Menú móvil desplegable (JS controlado) -->
            <div id="mobile-menu" class="mobile-menu hidden md:hidden bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700 shadow-lg">
                <ul class="flex flex-col p-4 space-y-2">
                    <li>
                        <a href="{{ route('login') }}" class="block w-full py-2 px-4 text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 transition">Iniciar Sesión</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="block w-full py-2 px-4 text-center text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-800 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition">Registrarse</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <section class="relative flex items-center justify-center min-h-[calc(100vh-4rem)] bg-cover bg-center bg-no-repeat" 
                 style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('{{ asset('images/background.avif') }}'); background-size: cover;">
            <!-- Overlay degradado sutil (ya incluido en el background) -->
            <div class="absolute inset-0 bg-black/30 backdrop-blur-[2px]"></div>
            
            <div class="relative z-10 max-w-3xl mx-auto text-center text-white px-6 py-20 animate-fade-in">
                <h1 class="text-4xl md:text-7xl font-extrabold mb-6 tracking-tight leading-tight">
                    Expande tu mente<br>
                    <span class="bg-gradient-to-r from-yellow-300 to-orange-400 bg-clip-text text-transparent">leyendo un libro</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-200 mb-10 max-w-2xl mx-auto">
                    Únete a una comunidad de lectores apasionados. Descubre, aprende y crece con Readify.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('login') }}"
                       class="px-8 py-3 bg-blue-600 hover:bg-blue-700 rounded-full font-semibold text-white shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                        Iniciar sesión
                    </a>
                    <a href="{{ route('register') }}"
                       class="px-8 py-3 bg-white/10 backdrop-blur-sm border border-white/30 hover:bg-white/20 rounded-full font-semibold text-white shadow-lg transition-all duration-200">
                        Registrarse gratis
                    </a>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-gray-900 text-white py-8 mt-auto">
        <div class="max-w-screen-xl mx-auto px-4 text-center">
            <p class="text-sm text-gray-400">&copy; {{ date('Y') }} Readify. Todos los derechos reservados.</p>
            <div class="flex justify-center space-x-6 mt-4">
                <a href="#" class="text-gray-400 hover:text-white transition">Acerca de</a>
                <a href="#" class="text-gray-400 hover:text-white transition">Privacidad</a>
                <a href="#" class="text-gray-400 hover:text-white transition">Términos</a>
            </div>
        </div>
    </footer>

    <script>
        // Menú móvil toggle con vanilla JS
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        let isMenuOpen = false;

        function toggleMenu() {
            isMenuOpen = !isMenuOpen;
            mobileMenu.classList.toggle('hidden', !isMenuOpen);
            menuBtn.setAttribute('aria-expanded', isMenuOpen);
            // Pequeña animación adicional con aria-label
            menuBtn.setAttribute('aria-label', isMenuOpen ? 'Cerrar menú' : 'Abrir menú');
        }

        menuBtn.addEventListener('click', toggleMenu);

        // Cerrar menú al hacer clic en un enlace (opcional)
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (isMenuOpen) toggleMenu();
            });
        });

        // Cerrar menú al redimensionar a escritorio (evitar conflictos)
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768 && isMenuOpen) {
                toggleMenu();
            }
        });
    </script>

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fade-in 0.8s ease-out forwards;
        }
    </style>
</body>
</html>