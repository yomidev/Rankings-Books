<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Readify</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <header>
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Readify</span>
                </a>
                <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="{{ route('login') }}" class="block py-2 px-3 text-white bg-blue-700 rounded-sm md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500">Iniciar Sesión</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Registrarse</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section class="relative flex items-center justify-center h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/background.avif') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        <div class="max-w-[500px] relative z-10 text-center text-white px-6">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Expande tu mente leyendo un libro
            </h1>
            <div class="flex justify-center space-x-4">
                <a href="{{ route('login') }}"
                   class="px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded-full font-semibold transition">
                    Iniciar sesión
                </a>
                <a href="{{ route('register') }}"
                   class="px-6 py-3 bg-white text-blue-600 hover:bg-gray-200 rounded-full font-semibold transition">
                    Registrarse
                </a>
            </div>
        </div>
    </section>
</body>
</html>
