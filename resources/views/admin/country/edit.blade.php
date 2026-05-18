@extends('admin.templates.main')
@section('navbar')
    @include('admin.templates.components.navbar')
@endsection
@section('content')
<div class="mx-auto items-center bg-neutral-primary-soft p-6 border border-default rounded shadow-xs md:flex-row md:max-w-3xl mt-10">
    <h1 class="text-center text-2xl font-extrabold">Actualizar País</h1>       
    <form action="{{ route('admin.country.update', $country->id) }}" method="POST" class="">
        @csrf
        @method('PUT')
        <div class="grid gap-6 mb-6">
            <div>
                <label for="first_name" class="block mb-2.5 text-sm font-medium text-heading">Ingrese el nombre del país</label>
                <input type="text" id="name" name="name" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="México" required value="{{ $country->name }}"/>
            </div>
        </div>
        <button type="submit" class="text-white bg-brand box-border border border-transparent bg-red-800 hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Guardar</button>
    </form>
</div>
@endsection