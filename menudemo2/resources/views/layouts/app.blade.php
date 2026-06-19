<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'AEREOGATROBAR' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="min-h-screen bg-black text-white">
    <div class="min-h-screen bg-black">
        <header class="border-b border-blue-600/30 bg-black/95 backdrop-blur-sm">
            <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-3 px-4 py-4 sm:px-6">
                <a href="{{ route('menu') }}" class="text-lg font-black uppercase tracking-widest text-white">AEREOGATROBAR</a>
                <nav class="flex flex-wrap items-center gap-3 text-xs uppercase tracking-widest">
                    <a href="{{ route('menu') }}" class="rounded-full border border-blue-600/40 bg-blue-600/10 px-4 py-2 text-blue-200 transition hover:bg-blue-600/20">Menú</a>
                    <a href="{{ route('admin.products.index') }}" class="rounded-full border border-yellow-400/40 bg-yellow-400/10 px-4 py-2 text-yellow-200 transition hover:bg-yellow-400/20">Admin</a>
                </nav>
            </div>
        </header>

        <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6">
            @yield('content')
        </main>
    </div>
</body>
</html>
