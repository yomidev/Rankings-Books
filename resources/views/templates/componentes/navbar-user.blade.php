<nav x-data="{ open: false }" class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700 sticky top-0 z-50">
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <a href="#" class="flex items-center space-x-2">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 w-auto" alt="Readify">
                <span class="text-xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Readify</span>
            </a>

            <!-- Desktop menu -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="#" class="text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400">Inicio</a>
                <a href="#" class="text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400">Mis Libros</a>
                <a href="#" class="text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400">Explorar</a>
                <a href="#" class="text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400">Autores</a>

                @auth
                    <div x-data="{ userOpen: false }" class="relative">
                        <button @click="userOpen = !userOpen" class="flex items-center space-x-2 text-gray-700 dark:text-gray-200 focus:outline-none">
                            <span>{{ auth()->user()->name }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="userOpen" @click.away="userOpen = false" x-cloak class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg py-1 z-10">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Mi perfil</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Cerrar sesión</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Registrarse</a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <button @click="open = !open" class="md:hidden text-gray-500 dark:text-gray-400 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile menu panel -->
    <div x-show="open" x-cloak class="md:hidden bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="#" class="block px-3 py-2 rounded-md text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800">Inicio</a>
            <a href="#" class="block px-3 py-2 rounded-md text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800">Mis Libros</a>
            <a href="#" class="block px-3 py-2 rounded-md text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800">Explorar</a>
            <a href="#" class="block px-3 py-2 rounded-md text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800">Autores</a>
            @auth
                <div class="border-t border-gray-200 dark:border-gray-700 pt-2 mt-2">
                    <span class="block px-3 py-1 text-sm text-gray-500">{{ auth()->user()->email }}</span>
                    <a href="{{ route('profile.edit') }}" class="block px-3 py-2 rounded-md text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800">Mi perfil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-3 py-2 rounded-md text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800">Cerrar sesión</button>
                    </form>
                </div>
            @else
                <div class="border-t border-gray-200 dark:border-gray-700 pt-2 mt-2">
                    <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-blue-600">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="block px-3 py-2 rounded-md text-blue-600">Registrarse</a>
                </div>
            @endauth
        </div>
    </div>
</nav>