    <!-- Navbar -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto flex justify-between items-center p-4">
            <!-- Logo -->
            <a href="#" class="text-red-500 text-2xl font-bold">MiAirbnb</a>

            <!-- Menú -->
            <nav class="space-x-6 flex items-center">
    <a href="/" class="text-gray-700 hover:text-red-500">Inicio</a>

    @auth
        <span class="text-gray-700"> <a href="{{ route('profile.edit') }}" class="text-gray-700 hover:text-red-500">Hola, {{ auth()->user()->name }}</a></span>
        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                Cerrar Sesión
            </button>
        </form>
    @else
        <a href="{{ route('login') }}" class="text-gray-700 hover:text-red-500">Iniciar Sesión</a>
        <a href="{{ route('register') }}" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
            Regístrate
        </a>
    @endauth
</nav>

        </div>
    </header>