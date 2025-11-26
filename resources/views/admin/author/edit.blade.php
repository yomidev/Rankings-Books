@extends('admin.templates.main')
@section('navbar')
    @include('admin.templates.components.navbar')
@endsection
@section('content')
<div class="flex flex-col mx-auto items-center bg-neutral-primary-soft p-6 border border-default rounded shadow-xs md:flex-row md:max-w-3xl mt-10">
    <form action="{{ route('admin.author.update', $author->id) }}" method="POST" class="" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="first_name" class="block mb-2.5 text-sm font-medium text-heading">Ingrese el nombre del autor</label>
            <input type="text" id="name" name="name" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Nombre" required value="{{ $author->name }}"/>
        </div>
        <div>
            <label for="biography" class="block mb-2.5 text-sm font-medium text-heading">Ingrese la biografía del autor</label>
            <textarea id="biography" name="biography" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Biografía" required>{{ $author->biography }}</textarea>
        </div>
        <div>
            <label for="website" class="block mb-2.5 text-sm font-medium text-heading">Ingrese el sitio web del autor</label>
            <input type="text" id="website" name="website" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="https://example.com" required value="{{ $author->website }}" />
        </div>
        <div>
            <label for="country_id" class="block mb-2.5 text-sm font-medium text-heading">Seleccione el país de origen</label>
            <select id="country_id" name="country_id" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" required>
                <option value="{{$author->country->id}}" selected>{{$author->country->name}}</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="photo" class="block mb-2.5 text-sm font-medium text-heading">Ingrese la foto del autor</label>
            <input type="file" id="photo" name="photo" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"/>
        </div>
    </div>
    <button type="submit" class="text-white bg-brand box-border border border-transparent bg-red-800 hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Guardar</button>
</form>
</div>    



@endsection