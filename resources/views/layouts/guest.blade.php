<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Readify') }} - Acceso</title>

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind + Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }
        .bg-readify {
            background-image: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">

    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Columna izquierda: Branding / Imagen -->
        <div class="relative hidden md:flex md:w-1/2 bg-cover bg-center bg-no-repeat"
             style="background-image: url('{{ asset('images/background.avif') }}');">
            <div class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>
            <div class="relative z-10 flex flex-col justify-center items-center text-center text-white p-12">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-16 mb-6" alt="Readify">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Readify</h1>
                <p class="text-xl text-gray-200">Expande tu mente<br>leyendo un libro</p>
                <div class="mt-10 w-24 h-1 bg-blue-400 rounded-full"></div>
            </div>
        </div>

        <!-- Columna derecha: Formulario -->
        <div class="flex-1 flex items-center justify-center bg-gray-50 dark:bg-gray-900 p-6 sm:p-8">
            <div class="w-full max-w-md">
                {{ $slot }}
            </div>
        </div>
    </div>

    <!-- Opcional: mostrar enlaces de copyright solo en móvil -->
    <div class="md:hidden text-center text-xs text-gray-500 dark:text-gray-400 py-4">
        &copy; {{ date('Y') }} Readify. Todos los derechos reservados.
    </div>
</body>
</html>