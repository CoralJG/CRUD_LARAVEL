<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold">
            {{ __(key: 'Detalles Producto') }}
        </h2>
    </x-slot>

    <div class="container mt-4">
        <h1>Detalles Producto:</h1>

        <form action="{{ route('productos.update', $producto->id) }}" method="POST">
            @csrf
            @method('PUT')
            <br>
            El producto es: {{$producto->name}} <br>
            Descripción: {{$producto->description}} <br>
            Precio: {{$producto->price}}€ <br>
        </form>
    </div>
</x-app-layout>