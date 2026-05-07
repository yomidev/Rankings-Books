@extends('admin.templates.main')

@section('content')
<main class="p-4 md:p-6">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
        <div class="mb-6">
            <h5 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-white">Gestión de Autores</h5>
            <div class="mt-4 text-end">
                <a href="{{ route('admin.author.create') }}" class="inline-flex items-center px-4 py-2 bg-green-700 hover:bg-green-600 text-white font-semibold rounded-md transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Agregar nuevo autor
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Nombre</th>
                        <th class="px-4 py-3">Biografía</th>
                        <th class="px-4 py-3">Website</th>
                        <th class="px-4 py-3">Foto</th>
                        <th class="px-4 py-3">País</th>
                        <th class="px-4 py-3">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($authors as $author)
                    <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-4 py-3">{{ $author->id }}</td>
                        <td class="px-4 py-3">{{ $author->name }}</td>
                        <td class="px-4 py-3 max-w-xs truncate">{{ Str::limit($author->biography, 60) }}</td>
                        <td class="px-4 py-3">
                            @if($author->website)
                                <a href="{{ $author->website }}" target="_blank" rel="noopener noreferrer" class="text-yellow-500 hover:underline">{{ Str::limit($author->website, 30) }}</a>
                            @else
                                —
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            @if($author->photo && file_exists(public_path($author->photo)))
                                <img src="{{ asset($author->photo) }}" alt="{{ $author->name }}" class="w-10 h-10 rounded-full object-cover">
                            @else
                                <div class="w-10 h-10 rounded-full bg-gray-300 dark:bg-gray-600 flex items-center justify-center text-xs">Sin foto</div>
                            @endif
                        </td>
                        <td class="px-4 py-3">{{ $author->country->name ?? 'N/A' }}</td>
                        <td class="px-4 py-3">
                            <div class="flex gap-2">
                                <a href="{{ route('admin.author.edit', $author->id) }}" class="px-3 py-1.5 bg-yellow-600 hover:bg-yellow-500 text-white text-sm rounded-md">Editar</a>
                                <form id="delete-form-{{ $author->id }}" action="{{ route('admin.author.delete', $author->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="px-3 py-1.5 bg-red-600 hover:bg-red-500 text-white text-sm rounded-md" onclick="confirmDelete({{ $author->id }})">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-10 text-gray-500">No hay autores registrados. <a href="{{ route('admin.author.create') }}" class="text-blue-600">Crear uno</a></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            {{ $authors->links() }}
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