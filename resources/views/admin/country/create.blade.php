@extends('admin.templates.main')
@section('navbar')
    @include('admin.templates.components.navbar')
@endsection
@section('content')
    
<form action="{{ route('admin.country.save') }}" method="POST" class="">
    @csrf
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="first_name" class="block mb-2.5 text-sm font-medium text-heading">Ingrese el nombre del país</label>
            <input type="text" id="name" name="name" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="México" required />
        </div>
    </div>
    <button type="submit" class="text-white bg-brand box-border border border-transparent bg-red-800 hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Guardar</button>
</form>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.querySelector('form');

        form.addEventListener('submit', function (e) {
            Swal.fire({
                title: "Guardando...",
                text: "Por favor espera",
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
        });
    });
</script>

@endsection