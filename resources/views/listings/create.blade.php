
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clon de Airbnb</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite(['resources/css/app.css']) 
</head>
<body class="bg-gray-100">


    @include('partials.navbar')


<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-2xl">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Registrar Nueva Propiedad</h2>

      
        <form action="{{ route('listings.store') }}" method="POST">
            @csrf

         
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Título</label>
                <input type="text" name="title" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Descripción</label>
                <textarea name="description" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
            </div>

     
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Provincia</label>
                <select name="province_id" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="" disabled selected>Selecciona una provincia</option>
                    @foreach($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                    @endforeach
                </select>
            </div>

           
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Ubicación</label>
                <input type="text" name="location" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Longitud</label>
                <input type="text" name="longitude" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Latitud</label>
                <input type="text" name="latitude" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

        
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Precio por Noche ($)</label>
                <input type="number" step="0.01" name="price_per_night" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Máx. Huéspedes</label>
                <input type="number" name="max_guests" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

       
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Habitaciones</label>
                <input type="number" name="bedrooms" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

    
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Baños</label>
                <input type="number" name="bathrooms" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

         
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Estado</label>
                <select name="status" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="active">Activo</option>
                    <option value="inactive">Inactivo</option>
                </select>
            </div>


            @include('partials.tags')
          
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                    Guardar Propiedad
                </button>
            </div>


        </form>
    </div>
</div>



  @include('partials.footer')


</body>
</html>
