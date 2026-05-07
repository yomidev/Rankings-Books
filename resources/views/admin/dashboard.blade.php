@extends('admin.templates.main')
@section('title', 'Dashboard - Readify')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-white">Bienvenido, {{ auth()->user()->name }}</h3>
        </div>
    </div>
@endsection