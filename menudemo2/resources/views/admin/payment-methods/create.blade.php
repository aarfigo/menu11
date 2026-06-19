<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Método de Pago - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <div class="min-h-screen p-8">
        <div class="max-w-2xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold mb-2">💳 Crear Método de Pago</h1>
                <p class="text-gray-400">Agrega un nuevo método de pago a tu sistema</p>
            </div>

            <!-- Form -->
            <form action="{{ route('admin.payment-methods.store') }}" method="POST" class="bg-gray-800 border border-gray-700 rounded-lg p-8">
                @csrf

                <!-- Nombre -->
                <div class="mb-6">
                    <label class="block text-sm font-bold mb-2">Nombre del Método *</label>
                    <input type="text" name="name" class="w-full bg-gray-700 border border-gray-600 rounded px-4 py-2 text-white placeholder-gray-400 focus:outline-none focus:border-blue-600" placeholder="Ej: Transferencia Bancaria" required>
                    @error('name') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Icono -->
                <div class="mb-6">
                    <label class="block text-sm font-bold mb-2">Emoji/Icono (opcional)</label>
                    <div class="flex gap-2">
                        <input type="text" name="icon" maxlength="2" class="w-20 bg-gray-700 border border-gray-600 rounded px-4 py-2 text-white text-center text-2xl focus:outline-none focus:border-blue-600" placeholder="💳" value="💳">
                        <p class="text-gray-400 text-sm flex items-center">Predeterminado: 💳</p>
                    </div>
                </div>

                <!-- Descripción -->
                <div class="mb-6">
                    <label class="block text-sm font-bold mb-2">Descripción (opcional)</label>
                    <textarea name="description" rows="3" class="w-full bg-gray-700 border border-gray-600 rounded px-4 py-2 text-white placeholder-gray-400 focus:outline-none focus:border-blue-600" placeholder="Ej: Realiza una transferencia bancaria al siguiente número de cuenta..."></textarea>
                </div>

                <!-- Beneficiary -->
                <div class="mb-6">
                    <label class="block text-sm font-bold mb-2">Beneficiario (opcional)</label>
                    <input type="text" name="beneficiary" class="w-full bg-gray-700 border border-gray-600 rounded px-4 py-2 text-white placeholder-gray-400 focus:outline-none focus:border-blue-600" placeholder="Ej: Marcos a. Andrade">
                    @error('beneficiary') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Account Number -->
                <div class="mb-6">
                    <label class="block text-sm font-bold mb-2">Número de Cuenta (opcional)</label>
                    <input type="text" name="account_number" class="w-full bg-gray-700 border border-gray-600 rounded px-4 py-2 text-white placeholder-gray-400 focus:outline-none focus:border-blue-600" placeholder="Ej: 0123 4567 8901">
                    @error('account_number') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Bank Name -->
                <div class="mb-6">
                    <label class="block text-sm font-bold mb-2">Banco (opcional)</label>
                    <input type="text" name="bank_name" class="w-full bg-gray-700 border border-gray-600 rounded px-4 py-2 text-white placeholder-gray-400 focus:outline-none focus:border-blue-600" placeholder="Ej: Salford y asociados">
                    @error('bank_name') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Phone -->
                <div class="mb-6">
                    <label class="block text-sm font-bold mb-2">Teléfono (opcional)</label>
                    <input type="tel" name="phone" class="w-full bg-gray-700 border border-gray-600 rounded px-4 py-2 text-white placeholder-gray-400 focus:outline-none focus:border-blue-600" placeholder="Ej: 1234-5678">
                    @error('phone') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Active Status -->
                <div class="mb-8">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_active" class="w-4 h-4" checked>
                        <span class="text-sm font-bold">Activar este método de pago</span>
                    </label>
                </div>

                <!-- Buttons -->
                <div class="flex gap-4">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-8 py-3 rounded font-bold transition">
                        ✅ Crear Método
                    </button>
                    <a href="{{ route('admin.payment-methods.index') }}" class="bg-gray-700 hover:bg-gray-600 px-8 py-3 rounded font-bold transition">
                        ❌ Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
