@extends('layouts.app')

@section('content')
    <section class="rounded-3xl border border-blue-600/30 bg-white/5 p-8 shadow-2xl shadow-blue-900/10">
        <div class="mb-8">
            <p class="text-xs font-black uppercase tracking-[0.3em] text-blue-400">Editar categoría</p>
            <h1 class="mt-3 text-4xl font-black uppercase tracking-tight text-white">Editar: {{ $category->name }}</h1>
        </div>

        <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="rounded-3xl border border-blue-600/30 bg-black/70 p-6 shadow-lg shadow-blue-900/10">
                <div class="space-y-4">
                    <label class="block">
                        <span class="text-xs font-black uppercase tracking-widest text-gray-400">Nombre de la categoría *</span>
                        <input name="name" value="{{ old('name', $category->name) }}" class="mt-2 w-full rounded-3xl border border-blue-600/30 bg-black/80 px-4 py-3 text-white focus:border-blue-400 focus:outline-none @error('name') border-red-500 @enderror" required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </label>

                    <label class="block">
                        <span class="text-xs font-black uppercase tracking-widest text-gray-400">Descripción</span>
                        <textarea name="description" rows="3" class="mt-2 w-full rounded-3xl border border-blue-600/30 bg-black/80 px-4 py-3 text-white focus:border-blue-400 focus:outline-none">{{ old('description', $category->description) }}</textarea>
                    </label>

                    <label class="block">
                        <span class="text-xs font-black uppercase tracking-widest text-gray-400">Ícono (emoji) *</span>
                        <input name="icon" value="{{ old('icon', $category->icon) }}" class="mt-2 w-full rounded-3xl border border-blue-600/30 bg-black/80 px-4 py-3 text-white focus:border-blue-400 focus:outline-none" maxlength="10">
                        <p class="mt-1 text-xs text-gray-500">Ej: 🍔 🍕 🥗 🍟 🥤</p>
                    </label>

                    <label class="flex items-center gap-3">
                        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $category->is_active)) class="h-4 w-4 rounded border-blue-600/30 bg-black/80 text-blue-600">
                        <span class="text-xs font-black uppercase tracking-widest text-gray-400">Activa</span>
                    </label>
                </div>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-blue-600 px-6 py-3 text-sm font-black uppercase tracking-widest text-white transition hover:bg-blue-700">
                    💾 Guardar Cambios
                </button>
                <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center justify-center rounded-full border border-blue-600/30 bg-black/70 px-6 py-3 text-sm font-black uppercase tracking-widest text-blue-300 transition hover:border-blue-600/50">
                    ← Volver
                </a>
            </div>
        </form>
    </section>
@endsection
