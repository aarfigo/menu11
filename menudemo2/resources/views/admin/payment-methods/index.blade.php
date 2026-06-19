<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Métodos de Pago - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <div class="min-h-screen p-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-4xl font-bold mb-2">💳 Métodos de Pago</h1>
                    <p class="text-gray-400">Gestiona los métodos de pago disponibles</p>
                </div>
                <a href="{{ route('admin.payment-methods.create') }}" class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg font-bold transition">
                    + Nuevo Método
                </a>
            </div>

            <!-- Messages -->
            @if ($message = Session::get('success'))
                <div class="bg-green-600/20 border border-green-600 text-green-400 px-6 py-4 rounded-lg mb-6">
                    {{ $message }}
                </div>
            @endif

            <!-- Payment Methods Grid -->
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($paymentMethods as $method)
                    <div class="bg-gray-800 border border-gray-700 rounded-lg p-6 hover:border-blue-600 transition">
                        <!-- Header -->
                        <div class="flex items-start justify-between mb-4">
                            <div>
                                <span class="text-3xl">{{ $method->icon }}</span>
                                <h3 class="text-xl font-bold mt-2">{{ $method->name }}</h3>
                            </div>
                            <div class="flex gap-2">
                                <a href="{{ route('admin.payment-methods.edit', $method->id) }}" class="bg-blue-600 hover:bg-blue-700 p-2 rounded transition">
                                    ✏️ Editar
                                </a>
                                <form action="{{ route('admin.payment-methods.destroy', $method->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este método?');" class="inline">
                                    @csrf @method('DELETE')
                                    <button class="bg-red-600 hover:bg-red-700 p-2 rounded transition">🗑️ Eliminar</button>
                                </form>
                            </div>
                        </div>

                        <!-- Details -->
                        <div class="space-y-3 text-sm mb-4">
                            @if ($method->beneficiary)
                                <div>
                                    <p class="text-gray-400">Beneficiario:</p>
                                    <p class="font-semibold">{{ $method->beneficiary }}</p>
                                </div>
                            @endif

                            @if ($method->account_number)
                                <div>
                                    <p class="text-gray-400">Cuenta:</p>
                                    <p class="font-semibold">{{ $method->account_number }}</p>
                                </div>
                            @endif

                            @if ($method->bank_name)
                                <div>
                                    <p class="text-gray-400">Banco:</p>
                                    <p class="font-semibold">{{ $method->bank_name }}</p>
                                </div>
                            @endif

                            @if ($method->phone)
                                <div>
                                    <p class="text-gray-400">Teléfono:</p>
                                    <p class="font-semibold">{{ $method->phone }}</p>
                                </div>
                            @endif
                        </div>

                        <!-- Status -->
                        <div class="pt-4 border-t border-gray-700">
                            @if ($method->is_active)
                                <span class="inline-block bg-green-600/20 text-green-400 px-3 py-1 rounded text-xs font-bold">✅ Activo</span>
                            @else
                                <span class="inline-block bg-red-600/20 text-red-400 px-3 py-1 rounded text-xs font-bold">❌ Inactivo</span>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-gray-800 border border-dashed border-gray-600 rounded-lg p-12 text-center">
                        <p class="text-gray-400 mb-4">No hay métodos de pago configurados</p>
                        <a href="{{ route('admin.payment-methods.create') }}" class="bg-blue-600 hover:bg-blue-700 px-6 py-2 rounded inline-block">
                            Crear primer método
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- Navigation -->
            <div class="mt-12 flex gap-4">
                <a href="{{ route('admin.products.index') }}" class="bg-gray-700 hover:bg-gray-600 px-6 py-2 rounded transition">
                    ← Volver a Productos
                </a>
                <a href="{{ route('admin.zones.index') }}" class="bg-gray-700 hover:bg-gray-600 px-6 py-2 rounded transition">
                    → Ver Zonas de Entrega
                </a>
            </div>
        </div>
    </div>
</body>
</html>
