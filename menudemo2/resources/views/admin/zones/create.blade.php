@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100">
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="mb-6">
            <a href="{{ route('admin.zones.index') }}" class="text-blue-600 hover:text-blue-900 text-sm font-medium">
                ← Volver a Zonas
            </a>
            <h1 class="text-3xl font-bold text-gray-900 mt-2">Crear Nueva Zona de Entrega</h1>
        </div>

        <!-- Formulario -->
        <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
            <form action="{{ route('admin.zones.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Nombre de Zona -->
<div>
    <label for="name" class="block text-sm font-medium text-gray-700">
        Nombre de la Zona *
    </label>
    <input 
        type="text" 
        name="name" 
        id="name" 
        placeholder="Ej: Valencia, Naguanagua, San Diego"
        value="{{ old('name') }}"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2 text-black"
        required>
    @error('name')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

                <!-- Costo de Entrega -->
               <div>
    <label for="cost" class="block text-sm font-medium text-gray-700">
        Costo de Entrega (USD) *
    </label>
    <input 
        type="number" 
        name="cost" 
        id="cost" 
        placeholder="Ej: 2.50"
        step="0.01"
        min="0"
        value="{{ old('cost') }}"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2 text-black"
        required>
    @error('cost')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

                <!-- Estado Activo -->
                <div>
                    <label class="flex items-center">
                        <input 
                            type="checkbox" 
                            name="is_active" 
                            value="1"
                            {{ old('is_active') ? 'checked' : 'checked' }}
                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-700">Zona Activa</span>
                    </label>
                    <p class="mt-1 text-xs text-gray-500">La zona aparecerá en las opciones de entrega si está activa</p>
                </div>

                <!-- Botones -->
                <div class="flex gap-3 pt-4">
                    <button 
                        type="submit" 
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                        Crear Zona
                    </button>
                    <a 
                        href="{{ route('admin.zones.index') }}" 
                        class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
