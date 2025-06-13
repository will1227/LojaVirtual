<x-app-layout>
    <x-slot name="header">
        <h3 class="text-center font-semibold text-gray-800 dark:text-gray-200">
            {{ __('Editar Fornecedor') }}
        </h3>
    </x-slot>

    <br>
    <div class="max-w-xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-md shadow">

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <x-input-error :messages="$error" class="mt-2" />
                @endforeach
            </ul>
        @endif

        @if (session('success'))
            <div class="p-4 mt-4 bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-100 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ url('suppliers/update/' . $supplier->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input class="w-full" type="text" name="name" value="{{ old('name', $supplier->name) }}" />
            </div>

            <div>
                <x-input-label for="description" :value="__('Descrição')" />
                <textarea id="description" name="description"
                    class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                    rows="5">{{ old('description', $supplier->description) }}</textarea>
            </div>

            <div>
                <x-input-label for="type_id" :value="__('Tipo de produto')" />
                <select id="type_id" name="type_id"
                    class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $supplier->type_id == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ url('/suppliers') }}">
                    <x-secondary-button>Voltar</x-secondary-button>
                </a>

                <x-primary-button class="ms-4" type="submit">
                    {{ __('Atualizar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
