@extends('admin.templates.main')
@section('title', 'Crear Genero')
@section('content')
<div class="max-w-3xl mx-auto mt-10 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
    <h1 class="text-center text-2xl md:text-3xl font-extrabold text-gray-800 dark:text-white mb-8">Crear Género</h1>

    <form action="{{ route('admin.genres.save') }}" method="POST">
        @csrf

        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                Nombre del género <span class="text-red-500">*</span>
            </label>
            <input type="text" id="name" name="name"
                   value="{{ old('name') }}"
                   class="w-full p-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                   placeholder="Ej: Ciencia Ficción" required>
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                Descripción del género </span>
            </label>
            <textarea name="description" id="description" cols="30" rows="10" class="w-full p-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500"></textarea>
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end gap-3 mt-6">
            <a href="{{ route('admin.genres')}}"
               class="px-4 py-2 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-500 transition">
                Cancelar
            </a>
            <button type="submit"
                    class="px-4 py-2 bg-blue-700 hover:bg-blue-800 text-white rounded-lg transition">
                Guardar género
            </button>
        </div>
    </form>
</div>
@endsection
