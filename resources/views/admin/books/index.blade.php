@extends('admin.templates.main')
@section('title', 'Gestionar Libros')
@section('content')
    <main class="p-4 md:p-6">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
        <div class="mb-6">
            <h5 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-white">Gestión de Libros</h5>
            <div class="mt-4 text-end">
                <a href="{{ route('admin.books.create') }}" class="inline-flex items-center px-4 py-2 bg-green-700 hover:bg-green-600 text-white font-semibold rounded-md transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Agregar nuevo libro
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Titulo</th>
                        <th class="px-4 py-3">Sinopsis</th>
                        <th class="px-4 py-3">Año de publicación</th>
                        <th class="px-4 py-3">Paginas</th>
                        <th class="px-4 py-3">Autor</th>
                        <th class="px-4 py-3">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                    <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-4 py-3">{{ $book->id }}</td>
                        <td class="px-4 py-3">{{ $book->title }}</td>
                        <td class="px-4 py-3 max-w-xs truncate">{{ Str::limit($book->synopsis, 60) }}</td>
                        <td class="px-4 py-3">{{$book->year}}</td>
                        <td class="px-4 py-3">
                            @if($book->front_page && file_exists(public_path($book->front_page)))
                                <img src="{{ asset($book->front_page) }}" alt="{{ $book->title }}" class="w-10 h-10 object-cover">
                            @else
                                <div class="w-10 h-10 bg-gray-300 dark:bg-gray-600 flex items-center justify-center text-xs">Sin portada</div>
                            @endif
                        </td>
                        <td class="px-4 py-3">{{ $book->author->name ?? 'N/A' }}</td>
                        <td class="px-4 py-3">
                            <div class="flex gap-2">
                                <a href="{{ route('admin.books.edit', $book->id) }}" class="px-3 py-1.5 bg-yellow-600 hover:bg-yellow-500 text-white text-sm rounded-md">Editar</a>
                                <form id="delete-form-{{ $book->id }}" action="{{ route('admin.books.delete', $book->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="px-3 py-1.5 bg-red-600 hover:bg-red-500 text-white text-sm rounded-md" onclick="confirmDelete({{ $book->id }})">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-10 text-gray-500">No hay libros registrados. <a href="{{ route('admin.books.create') }}" class="text-blue-600">Crear uno</a></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            {{ $books->links() }}
        </div>
    </div>
</main>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: '¿Eliminar autor?',
            text: "¡No podrás revertir esto!",
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
    @if(session('success'))
        Swal.fire({ icon: 'success', title: 'Éxito', text: '{{ session('success') }}', timer: 3000, showConfirmButton: false });
    @endif
    @if(session('error'))
        Swal.fire({ icon: 'error', title: 'Error', text: '{{ session('error') }}' });
    @endif
</script>
@endpush
@endsection