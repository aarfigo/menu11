@extends('layouts.app')

@section('content')
    <section class="rounded-3xl border border-blue-600/30 bg-white/5 p-8 shadow-2xl shadow-blue-900/10">
        <div class="mb-8 flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <p class="text-xs font-black uppercase tracking-[0.3em] text-blue-400">Configuración</p>
                <h1 class="mt-3 text-4xl font-black uppercase tracking-tight text-white">Configuración del Sistema</h1>
                <p class="mt-4 max-w-2xl text-sm leading-relaxed text-gray-300">Gestiona la tasa de cambio USD/BS, datos de contacto y configuración general.</p>
            </div>
 <a href="{{ route('admin.products.index') }}" class="inline-flex items-center justify-center rounded-full bg-blue-600 px-6 py-3 text-sm font-black uppercase tracking-widest text-white transition hover:bg-blue-700">
    ← Volver al Dashboard
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

        <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Sección: Tasa de Cambio -->
            <div class="rounded-3xl border border-yellow-600/30 bg-black/70 p-6 shadow-lg shadow-yellow-900/10">
                <h2 class="mb-4 text-2xl font-black uppercase tracking-tight text-white">💱 Tasa de Cambio USD → BS</h2>
                
                <div class="space-y-4">
                    <label class="block">
                        <span class="text-xs font-black uppercase tracking-widest text-gray-400">Valor del dólar en Bolívares</span>
                        <div class="mt-2 flex items-center gap-2">
                            <span class="text-lg font-black text-yellow-400">$1 USD =</span>
                            <input name="exchange_rate" type="number" step="0.01" value="{{ old('exchange_rate', $exchangeRate) }}" class="w-40 rounded-3xl border border-yellow-600/30 bg-black/80 px-4 py-2 text-lg font-bold text-yellow-300 focus:border-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500/30">
                            <span class="text-lg font-black text-yellow-400">BS</span>
                        </div>
                        @error('exchange_rate')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </label>
                    <p class="text-xs text-gray-400">Esta tasa se usa para convertir precios USD a Bolívares en el menú.</p>
                </div>
            </div>

            <!-- Sección: Contacto -->
            <div class="rounded-3xl border border-green-600/30 bg-black/70 p-6 shadow-lg shadow-green-900/10">
                <h2 class="mb-4 text-2xl font-black uppercase tracking-tight text-white">📞 Información de Contacto</h2>
                
                <div class="space-y-4">
                    <label class="block">
                        <span class="text-xs font-black uppercase tracking-widest text-gray-400">Número de WhatsApp</span>
                        <input name="whatsapp_number" type="text" value="{{ old('whatsapp_number', $whatsappNumber) }}" class="mt-2 w-full rounded-3xl border border-green-600/30 bg-black/80 px-4 py-2 text-white focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-500/30">
                        <p class="mt-1 text-xs text-gray-500">Ej: 584121234567 (incluir código de país)</p>
                        @error('whatsapp_number')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </label>

                    <label class="block">
                        <span class="text-xs font-black uppercase tracking-widest text-gray-400">Email de Contacto</span>
                        <input name="business_email" type="email" value="{{ old('business_email', $businessEmail) }}" class="mt-2 w-full rounded-3xl border border-green-600/30 bg-black/80 px-4 py-2 text-white focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-500/30">
                        @error('business_email')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </label>
                </div>
            </div>

            <!-- Botón de guardar -->
            <div class="flex gap-4">
                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-green-500 px-6 py-3 text-sm font-black uppercase tracking-widest text-black transition hover:bg-green-600">
                    ✅ Guardar Configuración
                </button>
             <a href="{{ route('admin.products.index') }}" class="inline-flex items-center justify-center rounded-full border border-blue-600/30 bg-black/70 px-6 py-3 text-sm font-black uppercase tracking-widest text-white transition hover:bg-black/50">
    ← Cancelar
</a>
            </div>
        </form>
    </section>
@endsection