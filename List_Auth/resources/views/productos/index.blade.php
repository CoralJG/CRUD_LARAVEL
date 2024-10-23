<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold">
            {{ __(key: 'Lista de productos') }}
        </h2>
    </x-slot>
    <a href="{{ route('productos.create') }}">Crear Producto</a>
    <p><---------------></p>
    <ul>
        @forelse ($productos as $producto)
            <li>
                <br>
                El producto es: {{$producto->name}} <br>
                Descripción: {{$producto->description}} <br>
                Precio: {{$producto->price}}€ <br>
                <form method="GET" action="{{ route('productos.edit', $producto->id) }}">
                    <input type="submit" value="✏️ Editar">
                </form>
                <form method="POST" action="{{ route('productos.destroy', $producto->id) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="🗑️ Eliminar">
                </form>
                <form method="GET" action="{{ route('productos.detail', $producto->id) }}">
                    <input type="submit" value="📋 Detalles">
                </form>
            </li>
            <br>
        @empty
            <li>No hay productos disponibles.</li>
        @endforelse
    </ul>
</x-app-layout>