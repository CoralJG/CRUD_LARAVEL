<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold">
            {{ __(key: 'Editar Producto') }}
        </h2>
    </x-slot>

    <div class="container mt-4">
        <h1>Editar Producto: {{$producto->name}}</h1>

        <form action="{{ route('productos.update', $producto->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" placeholder="Name of the product" name="name">
            <input type="text" placeholder="Description of the product" name="description">
            <input type="number" placeholder="Price of the product" name="price">
            <input type="submit" value="Update product">
        </form>
    </div>
</x-app-layout>