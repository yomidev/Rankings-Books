@extends('admin.templates.main')

@section('content')
<div class="max-w-4xl mx-auto mt-10 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
    <h1 class="text-2xl md:text-3xl font-extrabold text-center mb-8 text-gray-800 dark:text-white">Crear Nuevo Libro</h1>

    <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid gap-6 md:grid-cols-2">
            <!-- Nombre -->
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Titulo del Libro <span class="text-red-500">*</span>
                </label>
                <input type="text" id="title" name="title"
                       value="{{ $book->title  }}"
                       class="w-full p-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Ej: Batallas en el desierto" required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="md:col-span-2">
                <label for="synopsis" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Sinopsis <span class="text-red-500">*</span>
                </label>
                <textarea id="synopsis" name="synopsis" rows="5"
                          class="w-full p-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                          placeholder="Escribe la sinopsis del libro" required>{{$book->synopsis}}</textarea>
                @error('synopsis')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Año de publicación -->
            <div>
                <label for="year" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Año del publicación <span class="text-red-500">*</span>
                </label>
                <input type="number" id="year" name="year"
                       value="{{ $book->year }}"
                       class="w-full p-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Ej. 1998" required>
                @error('year')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="pages" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Número de Páginas <span class="text-red-500">*</span>
                </label>
                <input type="number" id="pages" name="pages"
                       value="{{ $book->pages }}"
                       class="w-full p-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Ej. 340" required>
                @error('pages')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Autor -->
            <div>
                <label for="author_id" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Autor <span class="text-red-500">*</span>
                </label>
                <select id="author_id" name="author_id"
                        class="w-full p-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                        required>
                    <option value="">-- Seleccione un autor --</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" {{ $book->id_author == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
                @error('author_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Foto -->
            <div>
                <label for="front_page" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Portada del libro <span class="text-red-500">*</span>
                </label>
                <input type="file" id="front_page" name="front_page"
                       class="w-full p-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white file:mr-2 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-sm file:bg-gray-200 dark:file:bg-gray-600 file:text-gray-800 dark:file:text-white"
                       accept="image/jpeg,image/png,image/jpg">
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Formatos: JPG, PNG. Máx. 2MB</p>
                @error('front_page')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex justify-end gap-3 mt-6">
            <a href="{{ route('admin.books') }}"
               class="px-4 py-2 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-500 transition">
                Cancelar
            </a>
            <button type="submit"
                    class="px-4 py-2 bg-blue-700 hover:bg-blue-800 text-white rounded-lg transition">
                Actualizar libro
            </button>
        </div>
    </form>
</div>
@endsection