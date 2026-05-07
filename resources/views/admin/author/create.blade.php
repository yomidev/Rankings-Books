@extends('admin.templates.main')

@section('content')
<div class="max-w-4xl mx-auto mt-10 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
    <h1 class="text-2xl md:text-3xl font-extrabold text-center mb-8 text-gray-800 dark:text-white">Crear Nuevo Autor</h1>

    <form action="{{ route('admin.author.save') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid gap-6 md:grid-cols-2">
            <!-- Nombre -->
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Nombre del autor <span class="text-red-500">*</span>
                </label>
                <input type="text" id="name" name="name"
                       value="{{ old('name') }}"
                       class="w-full p-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Ej: Gabriel García Márquez" required>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Sitio web -->
            <div>
                <label for="website" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Sitio web <span class="text-red-500">*</span>
                </label>
                <input type="url" id="website" name="website"
                       value="{{ old('website') }}"
                       class="w-full p-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                       placeholder="https://ejemplo.com" required>
                @error('website')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- País -->
            <div>
                <label for="country_id" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                    País de origen <span class="text-red-500">*</span>
                </label>
                <select id="country_id" name="country_id"
                        class="w-full p-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                        required>
                    <option value="">-- Seleccione un país --</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                            {{ $country->name }}
                        </option>
                    @endforeach
                </select>
                @error('country_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Foto -->
            <div>
                <label for="photo" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Foto del autor <span class="text-red-500">*</span>
                </label>
                <input type="file" id="photo" name="photo"
                       class="w-full p-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white file:mr-2 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-sm file:bg-gray-200 dark:file:bg-gray-600 file:text-gray-800 dark:file:text-white"
                       accept="image/jpeg,image/png,image/jpg" required>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Formatos: JPG, PNG. Máx. 2MB</p>
                @error('photo')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Biografía (ocupa todo el ancho) -->
            <div class="md:col-span-2">
                <label for="biography" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Biografía <span class="text-red-500">*</span>
                </label>
                <textarea id="biography" name="biography" rows="5"
                          class="w-full p-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                          placeholder="Escribe una breve biografía del autor..." required>{{ old('biography') }}</textarea>
                @error('biography')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex justify-end gap-3 mt-6">
            <a href="{{ route('admin.author.index') }}"
               class="px-4 py-2 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-500 transition">
                Cancelar
            </a>
            <button type="submit"
                    class="px-4 py-2 bg-blue-700 hover:bg-blue-800 text-white rounded-lg transition">
                Guardar autor
            </button>
        </div>
    </form>
</div>
@endsection