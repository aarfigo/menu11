@extends('layouts.app')

@section('content')
    <section class="rounded-3xl border border-blue-600/30 bg-white/5 p-8 shadow-2xl shadow-blue-900/10">
        <div class="mb-8 flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <p class="text-xs font-black uppercase tracking-[0.3em] text-blue-400">Panel administrativo</p>
                <h1 class="mt-3 text-4xl font-black uppercase tracking-tight text-white">Dashboard</h1>
                <p class="mt-4 max-w-2xl text-sm leading-relaxed text-gray-300">Gestiona todos los aspectos de tu restaurante desde aquí: productos, categorías, zonas de entrega, configuración y más.</p>
            </div>
            <a href="{{ route('menu') }}" class="inline-flex items-center justify-center rounded-full bg-blue-600 px-6 py-3 text-sm font-black uppercase tracking-widest text-white transition hover:bg-blue-700">
                ← Volver al menú
            </a>
        </div>

        <div class="grid gap-6 mb-10 md:grid-cols-2 lg:grid-cols-3">
            <a href="#productos" class="group rounded-3xl border border-blue-600/30 bg-black/70 p-6 shadow-lg shadow-blue-900/10 transition hover:border-blue-500/50 hover:bg-black/50">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-black uppercase tracking-tight text-white group-hover:text-blue-300">Productos</h3>
                        <p class="mt-2 text-sm text-gray-400">Edita nombres, precios, fotos y descripciones</p>
                    </div>
                    <span class="text-3xl">🍔</span>
                </div>
            </a>

            <a href="{{ route('admin.categories.index') }}" class="group rounded-3xl border border-purple-600/30 bg-black/70 p-6 shadow-lg shadow-purple-900/10 transition hover:border-purple-500/50 hover:bg-black/50">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-black uppercase tracking-tight text-white group-hover:text-purple-300">Categorías</h3>
                        <p class="mt-2 text-sm text-gray-400">Organiza productos por categorías</p>
                    </div>
                    <span class="text-3xl">📁</span>
                </div>
            </a>

            <a href="{{ route('admin.zones.index') }}" class="group rounded-3xl border border-green-600/30 bg-black/70 p-6 shadow-lg shadow-green-900/10 transition hover:border-green-500/50 hover:bg-black/50">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-black uppercase tracking-tight text-white group-hover:text-green-300">Zonas de Entrega</h3>
                        <p class="mt-2 text-sm text-gray-400">Configura áreas y costos de delivery</p>
                    </div>
                    <span class="text-3xl">🚚</span>
                </div>
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 rounded-3xl border border-green-500/20 bg-green-500/10 p-4 text-sm text-green-100">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-3xl border border-red-500/20 bg-red-500/10 p-4 text-sm text-red-100">
                <p class="font-black uppercase tracking-widest text-red-200">Hay errores al guardar:</p>
                <ul class="mt-2 list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div id="productos" class="space-y-6">
            <h2 class="text-2xl font-black uppercase tracking-tight text-white mb-6">Editar Productos del Menú</h2>
            
            @forelse($products as $product)
                <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="rounded-3xl border border-blue-600/30 bg-black/70 p-6 shadow-lg shadow-blue-900/10">
                    @csrf
                    @method('PUT')

                    <div class="grid gap-6 lg:grid-cols-[220px_1fr_1fr]">
                        
                        <!-- SECCIÓN DE IMAGEN MEJORADA -->
                        <div class="flex flex-col items-center justify-center rounded-2xl border border-blue-600/20 bg-black/40 p-4 text-center">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-blue-400 mb-3 block">Imagen del Producto</span>
                            <div class="relative group h-36 w-36 overflow-hidden rounded-2xl bg-black/50 border border-gray-700 flex items-center justify-center shadow-inner">
                                @if($product->image_url && trim($product->image_url) !== '')
                                    <img id="preview_edit_{{ $product->id }}" src="{{ $product->image_url }}" alt="{{ $product->name }}" class="h-full w-full object-cover transition duration-300 group-hover:opacity-75">
                                    <div id="placeholder_edit_{{ $product->id }}" class="hidden text-center">
                                        <span class="text-4xl block mb-1">📷</span>
                                        <span class="text-[10px] text-gray-500 uppercase tracking-wider block">Sin imagen</span>
                                    </div>
                                @else
                                    <div id="placeholder_edit_{{ $product->id }}" class="text-center">
                                        <span class="text-4xl block mb-1">📷</span>
                                        <span class="text-[10px] text-gray-500 uppercase tracking-wider block">Sin imagen</span>
                                    </div>
                                    <img id="preview_edit_{{ $product->id }}" src="" class="hidden h-full w-full object-cover">
                                @endif
                            </div>
                            
                            <!-- Botones de Foto -->
                            <div class="mt-4 w-full space-y-2">
                                <label class="w-full cursor-pointer rounded-full bg-blue-600/20 px-4 py-2 text-center text-xs font-bold uppercase tracking-wider text-blue-300 border border-blue-500/30 hover:bg-blue-600/40 transition inline-block">
                                    ✏️ Cambiar Foto
                                    <input type="file" name="image" accept="image/*" class="hidden" onchange="previewImage(this, 'preview_edit_{{ $product->id }}', 'placeholder_edit_{{ $product->id }}')">
                                </label>
                                
                                @if($product->image_url && trim($product->image_url) !== '')
                                    <button type="button" onclick="removeImage({{ $product->id }})" class="w-full rounded-full bg-red-600/20 px-4 py-2 text-xs font-bold uppercase tracking-wider text-red-300 border border-red-500/30 hover:bg-red-600/40 transition">
                                        🗑️ Eliminar Foto
                                    </button>
                                    <input type="hidden" id="remove_image_{{ $product->id }}" name="remove_image" value="0">
                                @endif
                            </div>
                        </div>

                        <div class="space-y-4">
                            <label class="block">
                                <span class="text-xs font-black uppercase tracking-widest text-gray-400">Nombre del producto</span>
                                <input name="name" value="{{ old('name', $product->name) }}" class="mt-2 w-full rounded-3xl border border-blue-600/30 bg-black/80 px-4 py-3 text-white focus:border-blue-400 focus:outline-none" required>
                            </label>
                            <label class="block">
                                <span class="text-xs font-black uppercase tracking-widest text-gray-400">Descripción</span>
                                <textarea name="description" rows="3" class="mt-2 w-full rounded-3xl border border-blue-600/30 bg-black/80 px-4 py-3 text-white focus:border-blue-400 focus:outline-none">{{ old('description', $product->description) }}</textarea>
                            </label>
                        </div>

                        <div class="grid gap-4">
                            <label class="block">
                                <span class="text-xs font-black uppercase tracking-widest text-gray-400">Precio USD</span>
                                <input name="price_usd" type="number" step="0.01" value="{{ old('price_usd', $product->price_usd) }}" class="mt-2 w-full rounded-3xl border border-blue-600/30 bg-black/80 px-4 py-3 text-white focus:border-blue-400 focus:outline-none price-input" required>
                            </label>
                            
                            <label class="block">
                                <span class="text-xs font-black uppercase tracking-widest text-gray-400">Categoría</span>
                                <select name="category_id" id="category_id_edit_{{ $product->id }}" class="mt-2 w-full rounded-3xl border border-blue-600/30 bg-black/80 px-4 py-3 text-white focus:border-blue-400 focus:outline-none" required>
                                    <option value="">-- Selecciona una categoría --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </label>
                            
                            <div class="grid grid-cols-2 gap-3">
                                <label class="block">
                                    <span class="text-xs font-black uppercase tracking-widest text-gray-400">Etiqueta</span>
                                    <input name="tag" value="{{ old('tag', $product->tag) }}" class="mt-2 w-full rounded-3xl border border-blue-600/30 bg-black/80 px-3 py-3 text-sm text-white focus:border-blue-400 focus:outline-none">
                                </label>
                                <label class="block">
                                    <span class="text-xs font-black uppercase tracking-widest text-gray-400">Badge</span>
                                    <input name="badge" value="{{ old('badge', $product->badge) }}" class="mt-2 w-full rounded-3xl border border-blue-600/30 bg-black/80 px-3 py-3 text-sm text-white focus:border-blue-400 focus:outline-none">
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between border-t border-gray-800 pt-4">
                        <button type="submit" class="inline-flex items-center justify-center rounded-full bg-blue-600 px-6 py-3 text-sm font-black uppercase tracking-widest text-white transition hover:bg-blue-700">
                            💾 Guardar cambios
                        </button>
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-center">
                            <span class="text-xs uppercase tracking-widest text-gray-400">ID {{ $product->id }}</span>
                            <button type="button" onclick="if(confirm('¿Seguro que deseas eliminar este producto?')) document.getElementById('delete-product-{{ $product->id }}').submit();" class="inline-flex items-center justify-center rounded-full bg-red-600/20 px-4 py-2 text-xs font-black uppercase tracking-widest text-red-300 border border-red-500/30 transition hover:bg-red-600/40">
                                🗑️ Eliminar
                            </button>
                        </div>
                    </div>
                </form>

                <form id="delete-product-{{ $product->id }}" action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
            @empty
                <div class="rounded-3xl border border-blue-600/30 bg-black/60 p-8 text-gray-300">
                    No hay productos registrados. Agrega uno nuevo abajo.
                </div>
            @endforelse
        </div>

        <div class="mt-10 rounded-3xl border border-blue-600/30 bg-black/70 p-6 shadow-lg shadow-blue-900/10">
            <h2 class="text-2xl font-black uppercase tracking-tight text-white mb-6">Agregar nuevo producto</h2>
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="grid gap-6 lg:grid-cols-[220px_1fr_1fr]">
                @csrf
                
                <div class="flex flex-col items-center justify-center rounded-2xl border border-green-600/20 bg-black/40 p-4 text-center">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-green-400 mb-3 block">Subir Imagen</span>
                    <div class="relative h-36 w-36 overflow-hidden rounded-2xl bg-black/50 border border-gray-700 flex items-center justify-center shadow-inner">
                        <div id="placeholder_create" class="text-center">
                            <span class="text-4xl block mb-1">📷</span>
                            <span class="text-[10px] text-gray-500 uppercase">Sin foto</span>
                        </div>
                        <img id="preview_create" src="" class="hidden h-full w-full object-cover">
                    </div>
                    <label class="mt-4 w-full cursor-pointer rounded-full bg-green-500/20 px-4 py-2 text-center text-xs font-bold uppercase tracking-wider text-green-300 border border-green-500/30 hover:bg-green-500/40 transition inline-block">
                        ✓ Seleccionar Foto
                        <input type="file" name="image" accept="image/*" class="hidden" onchange="previewImage(this, 'preview_create', 'placeholder_create')">
                    </label>
                </div>

                <div class="space-y-4">
                    <label class="block">
                        <span class="text-xs font-black uppercase tracking-widest text-gray-400">Nombre</span>
                        <input name="name" value="{{ old('name') }}" class="mt-2 w-full rounded-3xl border border-blue-600/30 bg-black/80 px-4 py-3 text-white focus:border-blue-400 focus:outline-none" required>
                    </label>
                    <label class="block">
                        <span class="text-xs font-black uppercase tracking-widest text-gray-400">Descripción</span>
                        <textarea name="description" rows="3" class="mt-2 w-full rounded-3xl border border-blue-600/30 bg-black/80 px-4 py-3 text-white focus:border-blue-400 focus:outline-none">{{ old('description') }}</textarea>
                    </label>
                </div>

                <div class="space-y-4 flex flex-col justify-between">
                    <div class="grid gap-4">
                        <label class="block">
                            <span class="text-xs font-black uppercase tracking-widest text-gray-400">Precio USD</span>
                            <input name="price_usd" type="number" step="0.01" value="{{ old('price_usd') }}" class="mt-2 w-full rounded-3xl border border-blue-600/30 bg-black/80 px-4 py-3 text-white focus:border-blue-400 focus:outline-none price-input" required>
                        </label>
                        
                        <label class="block">
                            <span class="text-xs font-black uppercase tracking-widest text-gray-400">Categoría</span>
                            <select name="category_id" id="category_id_create" class="mt-2 w-full rounded-3xl border border-blue-600/30 bg-black/80 px-4 py-3 text-white focus:border-blue-400 focus:outline-none" required>
                                <option value="">-- Selecciona una categoría --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                        
                        <div class="grid grid-cols-2 gap-3">
                            <label class="block">
                                <span class="text-xs font-black uppercase tracking-widest text-gray-400">Etiqueta</span>
                                <input name="tag" value="{{ old('tag') }}" class="mt-2 w-full rounded-3xl border border-blue-600/30 bg-black/80 px-3 py-3 text-sm text-white focus:border-blue-400 focus:outline-none">
                            </label>
                            <label class="block">
                                <span class="text-xs font-black uppercase tracking-widest text-gray-400">Badge</span>
                                <input name="badge" value="{{ old('badge') }}" class="mt-2 w-full rounded-3xl border border-blue-600/30 bg-black/80 px-3 py-3 text-sm text-white focus:border-blue-400 focus:outline-none">
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="inline-flex items-center justify-center rounded-full bg-green-500 px-6 py-3 text-sm font-black uppercase tracking-widest text-black transition hover:bg-green-600">
                        ➕ Crear Producto
                    </button>
                </div>
            </form>
        </div>
    </section>

    <script>
        function previewImage(input, previewId, placeholderId) {
            const preview = document.getElementById(previewId);
            const placeholder = placeholderId ? document.getElementById(placeholderId) : null;
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    if (placeholder) placeholder.classList.add('hidden');
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeImage(productId) {
            // Marcar que se debe eliminar la imagen
            document.getElementById('remove_image_' + productId).value = '1';
            
            // Resetear preview
            const preview = document.getElementById('preview_edit_' + productId);
            const placeholder = document.getElementById('placeholder_edit_' + productId);
            const fileInput = document.querySelector('input[name="image"]');
            
            preview.classList.add('hidden');
            placeholder.classList.remove('hidden');
            
            // Limpiar input de archivo
            if (fileInput) fileInput.value = '';
            
            alert('✓ La foto será eliminada al guardar los cambios');
        }

        async function updatePriceBs() {
            try {
                const response = await fetch('/api/settings/exchange-rate');
                const data = await response.json();
                const exchangeRate = data.exchange_rate || 1;
                
                document.querySelectorAll('.price-input').forEach(input => {
                    input.addEventListener('change', function() {
                        const priceUsd = parseFloat(this.value) || 0;
                        const priceBs = (priceUsd * exchangeRate).toFixed(2);
                        console.log(`$${priceUsd} USD = Bs ${priceBs}`);
                    });
                });
            } catch (error) {
                console.error('Error fetching exchange rate:', error);
            }
        }
        
        document.addEventListener('DOMContentLoaded', updatePriceBs);
    </script>
@endsection
