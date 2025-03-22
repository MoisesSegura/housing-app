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


<section class="container mx-auto px-4 py-12">
    <h2 class="text-3xl font-semibold mb-6 text-center">Alojamientos disponibles</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($listings as $listing)
            <div class="border rounded-lg shadow-lg overflow-hidden">
             
                @if($listing->image)
                    <img src="{{ asset('storage/' . $listing->image) }}" alt="Imagen de {{ $listing->title }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-300 flex items-center justify-center text-gray-600">
                        <span>Sin imagen</span>
                    </div>
                @endif

               
                <div class="p-4">
                    <h3 class="text-xl font-bold">{{ $listing->title }}</h3>
                    <p class="text-gray-600 text-sm">{{ $listing->location }}, {{ $listing->province->name }}</p>
                    <p class="text-gray-800 font-semibold mt-2">${{ number_format($listing->price_per_night, 2) }} / noche</p>
                    
                   
                    <a href="{{ route('listings.show', $listing) }}" class="mt-4 block text-center bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-lg">Ver más</a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Mensaje si no hay listings -->
    @if($listings->isEmpty())
        <p class="text-center text-gray-500 mt-6">No hay alojamientos disponibles en este momento.</p>
    @endif
</section>
    <!-- Buscador -->
    <section class="bg-white py-10 shadow-md">
        <div class="container mx-auto">
            <form class="grid grid-cols-1 md:grid-cols-3 gap-4 px-4">
                <input type="text" placeholder="¿A dónde quieres ir?" class="p-3 border rounded-md w-full">
                <input type="date" class="p-3 border rounded-md w-full">
                <button type="submit" class="bg-red-500 text-white px-4 py-3 rounded-md hover:bg-red-600 w-full">Buscar</button>
            </form>
        </div>
    </section>

    <!-- Propiedades Destacadas -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-6 text-center">Alojamientos Destacados</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Tarjeta 1 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="https://source.unsplash.com/400x300/?hotel,room" alt="Casa" class="w-full">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">Casa en la playa</h3>
                        <p class="text-gray-500">Ubicada en Cancún</p>
                        <p class="text-gray-900 font-bold mt-2">$120/noche</p>
                    </div>
                </div>

                <!-- Tarjeta 2 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="https://source.unsplash.com/400x300/?apartment,interior" alt="Casa" class="w-full">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">Apartamento moderno</h3>
                        <p class="text-gray-500">Ubicado en Nueva York</p>
                        <p class="text-gray-900 font-bold mt-2">$150/noche</p>
                    </div>
                </div>

                <!-- Tarjeta 3 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="https://source.unsplash.com/400x300/?cabin,mountains" alt="Casa" class="w-full">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">Cabaña en la montaña</h3>
                        <p class="text-gray-500">Ubicada en Suiza</p>
                        <p class="text-gray-900 font-bold mt-2">$200/noche</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')

</body>
</html>
