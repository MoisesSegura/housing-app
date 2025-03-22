<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clon de Airbnb</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-100">


    @include('partials.navbar')

  
<div class="container mx-auto p-6">
    <h2 class="text-3xl font-semibold mb-6">Mis Propiedades</h2>

  
    <a href="{{ route('listings.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-4 inline-block">
        + Agregar Nueva Propiedad
    </a>

    @if($listings->isEmpty())
        <p class="text-gray-500">No tienes propiedades aún.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($listings as $listing)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        @if($listing->image)
                            <img src="{{ asset('storage/' . $listing->image) }}" alt="Imagen del Listing" class="w-full h-full object-cover">
                        @else
                            <span class="text-gray-400">Sin Imagen</span>
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">{{ $listing->title }}</h3>
                        <p class="text-gray-600">{{ $listing->location }}</p>
                        <p class="text-gray-800 font-bold">${{ $listing->price_per_night }} por noche</p>

                        <div class="flex justify-between mt-4">
                            <a href="{{ route('listings.show', $listing) }}" class="text-blue-500 hover:underline">Ver</a>
                            <a href="{{ route('listings.edit', $listing) }}" class="text-yellow-500 hover:underline">Editar</a>
                            <form action="{{ route('listings.destroy', $listing) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta propiedad?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@include('partials.footer')

</body>
</html>