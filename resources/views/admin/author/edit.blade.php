@extends('admin.templates.main')

@section('content')
<div class="max-w-4xl mx-auto mt-10 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-900 dark:text-white">Editar Autor</h2>
    <form action="{{ route('admin.author.update', $author->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid gap-6 md:grid-cols-2">
            <!-- Nombre -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Nombre *</label>
                <input type="text" name="name" value="{{ old('name', $author->name) }}"
                       class="w-full p-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                       required>
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <!-- Sitio web -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Sitio web</label>
                <input type="url" name="website" value="{{ old('website', $author->website) }}"
                       class="w-full p-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                       required>
                @error('website') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <!-- País -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">País *</label>
                <select name="country_id"
                        class="w-full p-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                        required>
                    <option value="">Seleccione</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ old('country_id', $author->id_country) == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
                @error('country_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <!-- Foto -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Foto</label>
                @if($author->photo && file_exists(public_path($author->photo)))
                    <div class="mb-2">
                        <img src="{{ asset($author->photo) }}" class="h-20 w-20 object-cover rounded-full">
                        <p class="text-xs text-gray-500 dark:text-gray-400">Foto actual</p>
                    </div>
                @endif
                <input type="file" name="photo"
                       class="w-full p-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500 file:mr-2 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-sm file:bg-gray-200 dark:file:bg-gray-600 file:text-gray-800 dark:file:text-white"
                       accept="image/*">
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Dejar vacío para mantener la imagen actual. Máx. 2MB</p>
                @error('photo') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <!-- Biografía (ocupa todo el ancho) -->
            <div class="md:col-span-2">
                <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Biografía *</label>
                <textarea name="biography" rows="5"
                          class="w-full p-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                          required>{{ old('biography', $author->biography) }}</textarea>
                @error('biography') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
        <div class="flex justify-end gap-3 mt-6">
            <a href="{{ route('admin.author.index') }}"
               class="px-4 py-2 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-500 transition">
                Cancelar
            </a>
            <button type="submit"
                    class="px-4 py-2 bg-blue-700 hover:bg-blue-800 text-white rounded-lg transition">
                Actualizar
            </button>
        </div>
    </form>
</div>
@endsection