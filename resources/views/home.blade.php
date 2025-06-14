<x-app-layout>
    <x-slot name="header">
        <div class="hidden sm:flex justify-center space-x-8">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>
            <x-nav-link :href="route('products')" :active="request()->routeIs('products')">
                {{ __('Produtos') }}
            </x-nav-link>
            <x-nav-link :href="route('types')" :active="request()->routeIs('types')">
                {{ __('Tipos') }}
            </x-nav-link>
            <x-nav-link :href="route('suppliers')" :active="request()->routeIs('suppliers')">
                {{ __('Fornecedores') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="text-center mt-10">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 border px-6 py-2 inline-block rounded">
            Lista de Produtos
        </h2>
    </div>

    <div class="max-w-7xl mx-auto mt-8 px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($products as $product)
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
            {{-- Imagem --}}
            {{-- Alterado: object-cover para object-contain para evitar cortes --}}
            <img src="{{ $product->image_path 
                ? asset('storage/' . $product->image_path) 
                : asset('images/placeholder.jpg') }}"
                alt="{{ $product->name }}" class="w-full h-100 object-contain">

            {{-- Conteúdo --}}
            <div class="p-4">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white">{{ $product->name }}</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">{{ $product->description }}</p>
                <p class="mt-2 font-semibold text-green-600 dark:text-green-400">
                    R$ {{ number_format($product->price, 2, ',', '.') }}
                </p>

                {{-- Botão Adicionar ao Carrinho --}}
                <button class="mt-4 w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded transition duration-200">
                    Adicionar ao carrinho
                </button>
            </div>
        </div>
        @empty
        <p class="text-center col-span-4 text-gray-500 dark:text-gray-400">Nenhum produto encontrado.</p>
        @endforelse
    </div>
</x-app-layout>