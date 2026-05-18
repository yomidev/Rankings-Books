@extends('templates.main')

@section('navbar')
    @include('templates.componentes.navbar-user')
@endsection

@section('content')
    <!-- Hero / Carrusel -->
    <div x-data="carousel()" x-init="init()" class="relative w-full overflow-hidden">
        <div class="relative h-96 md:h-[500px]">
            <template x-for="(slide, index) in slides" :key="index">
                <div x-show="activeIndex === index" x-transition.opacity.duration.800ms class="absolute inset-0">
                    <img :src="slide.image" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                        <div class="text-center text-white px-4">
                            <h2 class="text-4xl md:text-6xl font-bold mb-4" x-text="slide.title"></h2>
                            <p class="text-xl" x-text="slide.subtitle"></p>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <!-- Controles -->
        <button @click="prev" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/30 hover:bg-white/50 rounded-full p-2">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </button>
        <button @click="next" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/30 hover:bg-white/50 rounded-full p-2">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </button>
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
            <template x-for="(slide, index) in slides" :key="index">
                <button @click="activeIndex = index" :class="{'bg-white': activeIndex === index, 'bg-white/50': activeIndex !== index}" class="w-2 h-2 rounded-full"></button>
            </template>
        </div>
    </div>

    <!-- Libros destacados -->
    <section class="max-w-screen-xl mx-auto px-4 py-12">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Libros destacados</h2>
            <a href="#" class="text-blue-600 hover:underline">Ver todos →</a>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
            @forelse($featuredBooks as $book)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-md transition">
                    <img src="{{ asset($book->front_page ?? 'images/default-cover.jpg') }}" alt="{{ $book->title }}" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-3">
                        <h3 class="font-semibold text-gray-800 dark:text-white truncate">{{ $book->title }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $book->author->name ?? 'Autor desconocido' }}</p>
                        <div class="flex items-center mt-1">
                            <span class="text-yellow-500">★</span>
                            <span class="text-sm text-gray-600 dark:text-gray-300 ml-1">{{ number_format($book->average_rating ?? 0, 1) }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-500">No hay libros destacados por el momento.</p>
            @endforelse
        </div>
    </section>

    <!-- Autores destacados -->
    <section class="max-w-screen-xl mx-auto px-4 py-12 bg-gray-100 dark:bg-gray-800/50 rounded-xl my-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Autores populares</h2>
            <a href="#" class="text-blue-600 hover:underline">Ver todos →</a>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
            @forelse($featuredAuthors as $author)
                <div class="text-center">
                    <img src="{{ asset($author->photo ?? 'images/default-avatar.png') }}" alt="{{ $author->name }}" class="w-24 h-24 rounded-full mx-auto object-cover border-2 border-blue-500">
                    <h3 class="mt-3 font-semibold text-gray-800 dark:text-white">{{ $author->name }}</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $author->books_count ?? 0 }} libros</p>
                    <a href="#" class="mt-2 inline-block text-sm text-blue-600 hover:underline">Ver perfil</a>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-500">No hay autores destacados aún.</p>
            @endforelse
        </div>
    </section>

    <!-- Sugerencias personalizadas (usuario logueado) -->
    @auth
    <section class="max-w-screen-xl mx-auto px-4 py-12">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Recomendados para ti</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
            @forelse($recommendedBooks as $book)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-md transition">
                    <img src="{{ asset($book->cover ?? 'images/default-cover.jpg') }}" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-3">
                        <h3 class="font-semibold truncate">{{ $book->title }}</h3>
                        <p class="text-sm text-gray-500">{{ $book->author->name ?? '' }}</p>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-gray-500">Pronto tendremos recomendaciones para ti. ¡Sigue agregando libros!</p>
            @endforelse
        </div>
    </section>
    @endauth

    <!-- Script para el carrusel Alpine -->
    @push('scripts')
    <script>
        function carousel() {
            return {
                activeIndex: 0,
                slides: [
                    { image: "{{ asset('images/carousel/1.jpg') }}", title: "Bienvenido a Readify", subtitle: "Descubre tu próxima gran lectura" },
                    { image: "{{ asset('images/carousel/2.jpg') }}", title: "Comparte reseñas", subtitle: "Conecta con otros lectores" },
                    { image: "{{ asset('images/carousel/3.jpg') }}", title: "Sigue a tus autores favoritos", subtitle: "No te pierdas sus novedades" },
                ],
                init() {
                    setInterval(() => { this.next(); }, 5000);
                },
                next() {
                    this.activeIndex = (this.activeIndex + 1) % this.slides.length;
                },
                prev() {
                    this.activeIndex = (this.activeIndex - 1 + this.slides.length) % this.slides.length;
                }
            }
        }
    </script>
    @endpush
@endsection