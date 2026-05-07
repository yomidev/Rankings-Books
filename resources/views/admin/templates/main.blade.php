<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel - Readify')</title>

    <!-- Fonts y estilos -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Transiciones suaves */
        .sidebar-transition {
            transition: transform 0.2s ease-in-out;
        }
        .dropdown-menu {
            transition: opacity 0.15s ease, transform 0.15s ease;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900">

    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden">
        <!-- Sidebar (Escritorio y móvil colapsable) -->
        <aside class="fixed inset-y-0 left-0 z-50 w-64 bg-white dark:bg-gray-800 shadow-lg transform transition-transform duration-200 ease-in-out md:translate-x-0 md:static md:inset-auto {{ session('sidebarCollapsed', false) ? '-translate-x-full' : 'translate-x-0' }}"
               :class="{ '-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen }">
            <div class="flex flex-col h-full">
                <!-- Logo área -->
                <div class="flex items-center justify-between p-4 border-b dark:border-gray-700">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
                        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 w-auto" alt="Readify">
                        <span class="text-xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Readify</span>
                    </a>
                    <button @click="sidebarOpen = false" class="md:hidden text-gray-500 hover:text-gray-700 dark:text-gray-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Navegación sidebar -->
                <nav class="flex-1 px-3 py-4 space-y-2 overflow-y-auto">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-3 py-2 text-gray-700 dark:text-gray-200 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Dashboard
                    </a>

                    <!-- Dropdown Catálogos -->
                    <div x-data="{ open: {{ request()->routeIs('admin.country') || request()->routeIs('admin.author.index') ? 'true' : 'false' }} }">
                        <button @click="open = !open" class="flex items-center justify-between w-full px-3 py-2 text-gray-700 dark:text-gray-200 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                                Catálogos
                            </div>
                            <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" x-collapse class="ml-6 mt-1 space-y-1">
                            <a href="{{ route('admin.country') }}" class="flex items-center px-3 py-2 text-sm text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 {{ request()->routeIs('admin.country') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                                Países
                            </a>
                            <a href="{{ route('admin.author.index') }}" class="flex items-center px-3 py-2 text-sm text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 {{ request()->routeIs('admin.author.index') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                                Autores
                            </a>
                        </div>
                    </div>
                </nav>

                <!-- Footer sidebar (opcional) -->
                <div class="p-4 border-t dark:border-gray-700 text-xs text-gray-500 dark:text-gray-400 text-center">
                    &copy; {{ date('Y') }} Readify
                </div>
            </div>
        </aside>

        <!-- Contenido principal -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            <!-- Navbar superior -->
            <header class="bg-white dark:bg-gray-800 shadow-sm sticky top-0 z-40">
                <div class="flex items-center justify-between px-4 py-3">
                    <!-- Botón para abrir sidebar en móvil -->
                    <button @click="sidebarOpen = true" class="md:hidden text-gray-500 hover:text-gray-700 dark:text-gray-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>

                    <div class="flex items-center space-x-3 ml-auto">
                        <!-- Usuario dropdown -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                                <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-white font-semibold">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>
                                <span class="hidden sm:inline text-gray-700 dark:text-gray-200">{{ auth()->user()->name }}</span>
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg py-1 z-50">
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Mi perfil</a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Cerrar sesión</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Contenido dinámico -->
            <main class="p-4 md:p-6">
                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
        @include('admin.templates.components.scripts')

</body>
</html>