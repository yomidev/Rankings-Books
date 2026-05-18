@extends('admin.templates.main')

@section('content')
<main class="content p-4 md:p-6">
    <div class="w-full bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
        <div class="mb-6">
            <h5 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-white">Gestión de Géneros</h5>
            <div class="mt-4 text-end">
                <a href="{{ route('admin.genres.create') }}" class="inline-flex items-center px-4 py-2 bg-green-700 hover:bg-green-600 text-white font-semibold rounded-md transition duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Agregar nuevo género
                </a>
            </div>
        </div>

        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Nombre del género</th>
                        <th scope="col" class="px-6 py-3">Descripción</th>

                        <th scope="col" class="px-6 py-3 text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($genres as $genre)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-6 py-4 font-medium">{{ $genre->id }}</td>
                        <td class="px-6 py-4">{{ $genre->name }}</td>
                        <td class="px-6 py-4">{{ $genre->description }}</td>
                        <td class="px-6 py-4 flex flex-wrap gap-2 justify-center">
                            <a href="{{route('admin.genres.edit', $genre->id)}}" class="inline-flex items-center px-3 py-1.5 bg-yellow-600 hover:bg-yellow-500 text-white text-sm font-medium rounded-md transition">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                Editar
                            </a>
                            <form id="delete-form-{{ $genre->id }}" action="{{route('admin.genres.delete', $genre->id)}}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="inline-flex items-center px-3 py-1.5 bg-red-600 hover:bg-red-500 text-white text-sm font-medium rounded-md transition" onclick="confirmDelete({{ $genre->id }})">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-10 text-center text-gray-500 dark:text-gray-400">
                            No hay géneros registrados.
                            <a href="" class="text-blue-600 hover:underline ml-1">Crear uno ahora</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $genres->links() }}
        </div>
    </div>
</main>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esta acción!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`delete-form-${id}`).submit();
            }
        });
    }

    // Mostrar notificaciones automáticas si hay sesión flash
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session('error') }}',
            confirmButtonText: 'Entendido'
        });
    @endif
</script>
@endpush
@endsection