@extends('layouts.app')

@section('content')
    <section class="rounded-3xl border border-blue-600/30 bg-white/5 p-8 shadow-2xl shadow-blue-900/10">
        <div class="mb-8 flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <p class="text-xs font-black uppercase tracking-[0.3em] text-blue-400">Gestión de categorías</p>
                <h1 class="mt-3 text-4xl font-black uppercase tracking-tight text-white">Categorías de Productos</h1>
                <p class="mt-4 max-w-2xl text-sm leading-relaxed text-gray-300">Organiza tus productos por categorías para una mejor presentación en el menú.</p>
            </div>
            <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center justify-center rounded-full bg-green-500 px-6 py-3 text-sm font-black uppercase tracking-widest text-black transition hover:bg-green-600">
                ➕ Nueva Categoría
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 rounded-3xl border border-green-500/20 bg-green-500/10 p-4 text-sm text-green-100">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-3xl border border-red-500/20 bg-red-500/10 p-4 text-sm text-red-100">
                <p class="font-black uppercase tracking-widest text-red-200">Hay errores:</p>
                <ul class="mt-2 list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="space-y-4">
            @forelse($categories as $category)
                <div class="rounded-3xl border border-blue-600/30 bg-black/70 p-6 shadow-lg shadow-blue-900/10">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <span class="text-4xl">{{ $category->icon }}</span>
                            <div>
                                <h3 class="text-xl font-black uppercase tracking-tight text-white">{{ $category->name }}</h3>
                                <p class="mt-1 text-sm text-gray-400">{{ $category->description }}</p>
                                <p class="mt-2 text-xs uppercase tracking-widest text-gray-500">
                                    ID {{ $category->id }} • Orden: {{ $category->order }} • 
                                    <span class="@if($category->is_active) text-green-400 @else text-red-400 @endif">
                                        @if($category->is_active) ✓ Activa @else ✗ Inactiva @endif
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="inline-flex items-center justify-center rounded-full bg-blue-600 px-4 py-2 text-sm font-black uppercase tracking-widest text-white transition hover:bg-blue-700">
                                ✏️ Editar
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar esta categoría?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full rounded-full border border-red-500/30 bg-red-500/10 px-4 py-2 text-sm font-black uppercase tracking-widest text-red-300 transition hover:bg-red-500/20">
                                    🗑️ Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="rounded-3xl border border-blue-600/30 bg-black/60 p-8 text-center text-gray-300">
                    <p class="text-lg">No hay categorías registradas.</p>
                    <a href="{{ route('admin.categories.create') }}" class="mt-4 inline-flex items-center justify-center rounded-full bg-green-500 px-6 py-3 text-sm font-black uppercase tracking-widest text-black transition hover:bg-green-600">
                        ➕ Crear la primera categoría
                    </a>
                </div>
            @endforelse
        </div>
    </section>
@endsection
