<x-guest-layout>
    <!-- Estado de sesión (ej. "sesión cerrada") -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Bienvenido de nuevo</h2>
        <p class="text-gray-600 dark:text-gray-400 mt-1">Inicia sesión en tu cuenta</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Correo electrónico')" class="text-gray-700 dark:text-gray-300" />
            <x-text-input id="email"
                          class="block mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:focus:ring-blue-800"
                          type="email"
                          name="email"
                          :value="old('email')"
                          required autofocus autocomplete="username"
                          placeholder="tu@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Contraseña')" class="text-gray-700 dark:text-gray-300" />
            <x-text-input id="password"
                          class="block mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:focus:ring-blue-800"
                          type="password"
                          name="password"
                          required autocomplete="current-password"
                          placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Recordarme y Olvidé contraseña -->
        <div class="flex items-center justify-between mb-6">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                       class="rounded border-gray-300 dark:border-gray-700 text-blue-600 shadow-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800"
                       name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Recordarme</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="text-sm text-blue-600 dark:text-blue-400 hover:underline">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </div>

        <!-- Botón de inicio de sesión -->
        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-4 rounded-lg transition duration-200 ease-in-out transform hover:scale-[1.01] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
            Iniciar Sesión
        </button>

        <!-- Enlace a registro -->
        <div class="text-center mt-6">
            <span class="text-gray-600 dark:text-gray-400">¿No tienes cuenta?</span>
            <a href="{{ route('register') }}" class="text-blue-600 dark:text-blue-400 font-medium hover:underline ml-1">
                Regístrate gratis
            </a>
        </div>
    </form>
</x-guest-layout>