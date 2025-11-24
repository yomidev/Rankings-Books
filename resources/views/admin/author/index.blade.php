@extends('admin.templates.main')
@section('navbar')
    @include('admin.templates.components.navbar')
@endsection
@section('content')
<main class="content p-5">
<div class="mb-7 mt-4">
    <a href="{{ route('admin.author.create') }}" class="bg-green-800 p-3 text-white font-bold border border-md">CREAR</a>
</div>
<div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
            <tr>
                <th scope="col" class="px-6 py-3 font-medium">
                    ID
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Biografia
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Website
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Fotografía
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    País de Origen
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                   Opciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author)
            <tr class="bg-neutral-primary border-b border-default">
               <td>{{$author->id}}</td>
               <td>{{$author->name}}</td>
                <td>{{$author->biography}}</td>
                 <td>{{$author->website}}</td>
                <td>
                    <img src="{{ asset($author->photo) }}" alt="Foto de {{ $author->name }}" class="w-16 h-16 object-cover rounded-full">
                </td>
                <td>{{$author->country->name}}</td>
               <td>
                <a href="{{ route('admin.author.edit',$author->id) }}">Editar</a>
                <form action="{{ route('admin.author.delete', $author->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
               </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $authors->links() }}
</div>

</main>
@endsection