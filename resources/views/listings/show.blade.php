<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clon de Airbnb</title>
    @vite(['resources/css/app.css']) <!-- Si usas Vite -->
</head>
<body class="bg-gray-100">


    @include('partials.navbar')


<section>
<div class="container mx-auto px-4 py-12">
   
    <div class="w-full h-[400px] bg-gray-300 rounded-lg overflow-hidden">
        @if($listing->image)
            <img src="{{ asset('storage/' . $listing->image) }}" alt="Imagen de {{ $listing->title }}" class="w-full h-full object-cover">
        @else
            <div class="flex items-center justify-center h-full text-gray-600 text-lg">Sin imagen</div>
        @endif
    </div>

   
    <div class="mt-6 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold">{{ $listing->title }}</h1>
            <p class="text-gray-600">{{ $listing->location }}, {{ $listing->province->name }}</p>
        </div>
        <div class="text-xl font-semibold text-gray-800">${{ number_format($listing->price_per_night, 2) }} / noche</div>
    </div>

    <!-- Información del alojamiento -->
    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <p class="text-gray-700">{{ $listing->description }}</p>
            <div class="mt-4 flex items-center space-x-6">
                <span><strong>{{ $listing->max_guests }}</strong> huéspedes</span>
                <span><strong>{{ $listing->bedrooms }}</strong> habitaciones</span>
                <span><strong>{{ $listing->bathrooms }}</strong> baños</span>
            </div>
        </div>
        <div class="bg-gray-100 p-4 rounded-lg">
            <h2 class="text-lg font-semibold mb-2">Anfitrión</h2>
            <p class="text-gray-800">{{ $listing->user->name }}</p>
            <p class="text-gray-600">{{ $listing->user->email }}</p>
        </div>
    </div>

    <!-- Mapa -->
    <div class="mt-8">
        <h2 class="text-2xl font-semibold mb-4">Ubicación</h2>
        <div class="w-full h-[300px] bg-gray-200 rounded-lg">
            <iframe 
                width="100%" 
                height="100%" 
                class="rounded-lg"
                loading="lazy"
                style="border:0;" 
                allowfullscreen 
                referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps?q={{ $listing->latitude }},{{ $listing->longitude }}&output=embed">
            </iframe>
        </div>
    </div>

    <!-- Botón de regresar -->
    <div class="mt-6">
        <a href="{{ route('listings.index') }}" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600">Volver</a>
    </div>
</div>
    </section>

    @include('partials.footer')

</body>
</html>
