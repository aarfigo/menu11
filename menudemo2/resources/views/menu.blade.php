<!DOCTYPE html>
<html lang="es" class="h-full antialiased scroll-behavior-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AEREO GASTROBAR - Menú Interactivo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        html { scroll-behavior: smooth; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        
        :root {
            --color-primary: #0052CC;
            --color-primary-dark: #003D99;
            --color-secondary: #FFFFFF;
            --color-background: #000000;
            --color-surface: #1a1a1a;
        }
        
        .aereo-gradient {
            background: linear-gradient(135deg, #000000 0%, #0052CC 50%, #000000 100%);
        }
        
        .aereo-accent {
            border-top: 4px solid #0052CC;
        }
        
        .collapse-icon {
            transition: transform 0.3s ease;
        }
        
        .collapse-icon.open {
            transform: rotate(180deg);
        }
    </style>
</head>
<body class="min-h-full flex flex-col bg-black text-white relative overflow-x-hidden">

    <header class="sticky top-0 z-40 w-full">
        <div class="relative overflow-hidden bg-black border-b-2 border-blue-600 shadow-lg shadow-blue-600/20">
            <div class="pointer-events-none absolute inset-0 bg-gradient-to-r from-blue-600/10 via-transparent to-blue-600/10"></div>
            
            <div class="relative mx-auto flex max-w-7xl items-center justify-between gap-3 px-4 pb-3 pt-3 sm:px-6 lg:px-8">
                <a href="#inicio" class="flex min-w-0 items-center gap-3">
                    <div class="h-14 flex items-center gap-2">
                        <div class="h-8 w-8 bg-blue-600"></div>
                        <div class="h-8 w-6 bg-white"></div>
                    </div>
                    <div class="min-w-0">
                        <p class="truncate text-2xl font-black uppercase leading-none tracking-tight text-white sm:text-3xl">AEREO GASTROBAR</p>
                        <p class="mt-0.5 truncate text-xs font-black uppercase tracking-widest text-gray-400 sm:text-sm">SUSHI & FOOD</p>
                    </div>
                </a>
                
                <button type="button" onclick="toggleCart()" aria-label="Abrir carrito" class="relative flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-blue-600 text-white shadow-lg shadow-blue-600/50 transition-all hover:bg-blue-700 hover:shadow-blue-600/75">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="8" cy="21" r="1"></circle>
                        <circle cx="19" cy="21" r="1"></circle>
                        <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                    </svg>
                    <span id="cart-badge" class="absolute -top-2 -right-2 hidden h-6 min-w-6 items-center justify-center rounded-full bg-red-500 px-1.5 text-xs font-black text-white shadow-md">0</span>
                </button>
            </div>
            
            <div class="relative mx-auto max-w-7xl px-3 pb-2 sm:px-6 lg:px-8">
                <nav class="mx-auto flex gap-2 rounded-lg bg-white/5 p-2 backdrop-blur-sm overflow-x-auto no-scrollbar">
                    <a href="#inicio" class="flex-1 flex h-10 items-center justify-center text-center text-xs font-black uppercase tracking-wider transition duration-200 hover:bg-blue-600/30 rounded-lg">Inicio</a>
                    <a href="#menu" class="flex-1 flex h-10 items-center justify-center text-center text-xs font-black uppercase tracking-wider transition duration-200 hover:bg-blue-600/30 rounded-lg">Menú</a>
                 
                    <a href="https://wa.me/584141427822" target="_blank" class="flex-1 flex h-10 items-center justify-center text-center text-xs font-black uppercase tracking-wider transition duration-200 hover:bg-blue-600/30 rounded-lg">WhatsApp</a>
                    <a href="https://www.instagram.com/aaronfigueredog/" target="_blank" rel="noreferrer" class="flex-1 flex h-10 items-center justify-center text-center text-xs font-black uppercase tracking-wider transition duration-200 hover:bg-blue-600/30 rounded-lg">Instagram</a>
                </nav>
            </div>
        </div>
    </header>

    <section id="inicio" class="relative overflow-hidden bg-black px-4 pb-16 pt-10 sm:pt-16 md:py-24">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-600/10 via-transparent to-transparent"></div>
        <div class="absolute top-0 left-1/2 w-96 h-96 -translate-x-1/2 -translate-y-1/2 rounded-full bg-blue-600/20 blur-3xl"></div>
        
        <div class="relative mx-auto grid max-w-7xl items-center gap-10 md:grid-cols-[1fr_0.85fr]">
            <div class="text-center md:text-left">
                <div class="mb-6 inline-flex items-center gap-3 rounded-lg border border-blue-600/50 bg-blue-600/10 px-6 py-3 text-sm font-black uppercase tracking-wider text-white shadow-lg shadow-blue-600/20">
                    <span class="h-3 w-3 rounded-full bg-blue-600"></span>
                    🌎Tú eliges el próximo destino
                </div>
                
                <h1 class="mx-auto max-w-3xl text-6xl font-black uppercase leading-tight tracking-tighter text-white drop-shadow-lg sm:text-7xl md:mx-0 md:text-8xl lg:text-9xl">
                    AEREO GASTROBAR
                </h1>
                <p class="mt-4 text-3xl font-black uppercase tracking-widest text-blue-400 sm:text-4xl">📍Vuelo 365 con rumbo al sabor</p>
                <p class="mx-auto mt-6 max-w-2xl text-base font-semibold leading-relaxed text-gray-300 sm:text-lg md:mx-0 md:text-xl">
                    Disfruta de las mejores promociones en sushi (Kioto, Hiroshima, Nagasaki) y exquisitos platos de entrada en un ambiente único. Pídelo para delivery o visítanos y vive la experiencia completa.
                </p>
                
                <div class="mt-10 grid gap-4 sm:grid-cols-2 md:max-w-2xl">
                    <a href="#menu" class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-8 py-4 text-sm font-black uppercase tracking-widest text-white shadow-lg shadow-blue-600/50 transition-all hover:bg-blue-700 hover:shadow-blue-600/75">
                        Ver Menú
                    </a>
                    <a href="https://wa.me/584220247499" target="_blank" rel="noreferrer" class="inline-flex items-center justify-center gap-2 rounded-lg border-2 border-blue-600 bg-transparent px-8 py-4 text-sm font-black uppercase tracking-widest text-white transition-all hover:bg-blue-600/10">
                        Ordenar Ahora
                    </a>
                </div>
            </div>
            
            <div class="relative mx-auto hidden max-w-md items-center justify-center md:flex">
                <div class="absolute h-96 w-96 rounded-full bg-blue-600/20 blur-3xl"></div>
                <div class="relative w-72 h-72 rounded-full bg-gradient-to-br from-blue-600 to-blue-900 flex items-center justify-center text-white font-black text-5xl shadow-2xl border-4 border-blue-400/30">
                    AEREO
                </div>
            </div>
        </div>
    </section>

    <section id="menu" class="relative overflow-hidden bg-black px-4 pb-20 pt-12 text-white sm:px-6 sm:pb-28 sm:pt-18 border-t border-blue-600/30">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-600/5 via-transparent to-transparent"></div>
        
        <div class="relative z-10 mx-auto max-w-7xl">
            <div class="mb-8 max-w-3xl sm:mb-12">
                <div class="mb-5 inline-flex gap-2 items-center">
                    <div class="h-1 w-12 bg-blue-600"></div>
                    <p class="text-xs font-black uppercase tracking-widest text-gray-400 sm:text-sm">NUESTRO MENÚ</p>
                </div>
                <h2 class="text-5xl font-black uppercase leading-tight tracking-tighter text-white drop-shadow-lg sm:text-6xl lg:text-7xl">
                    Elige tu <span class="text-blue-400">Favorito</span>
                </h2>
            </div>

            <div class="mb-10 rounded-lg border border-blue-600/30 bg-white/5 p-3 shadow-lg backdrop-blur-sm">
                <div id="categories-container" class="flex gap-3 overflow-x-auto no-scrollbar">
                    <button type="button" data-filter="all" onclick="filterMenu('all')" class="shrink-0 rounded-lg border-2 border-blue-600 bg-blue-600 px-5 py-2 text-xs font-black uppercase tracking-wider text-white transition-all hover:bg-blue-700">
                        Todos
                    </button>
                    @foreach($categories as $cat)
                        <button type="button" data-filter="{{ \Illuminate\Support\Str::slug($cat->name) }}" onclick="filterMenu('{{ \Illuminate\Support\Str::slug($cat->name) }}')" class="shrink-0 rounded-lg border-2 border-blue-600/30 bg-transparent px-5 py-2 text-xs font-black uppercase tracking-wider text-gray-300 transition-all hover:border-blue-600/60">
                            {{ $cat->icon ?? '🍔' }} {{ $cat->name }}
                        </button>
                    @endforeach
                </div>
            </div>

            <div id="products-grid" class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3"></div>
        </div>
    </section>

    <footer id="contacto" class="bg-black text-gray-500 py-12 px-4 border-t-2 border-blue-600/30">
        <div class="mx-auto max-w-7xl text-center text-xs">
            <p>&copy; 2026 AEREOGASTROBAR. Diseñado con excelencia.</p>
        </div>
    </footer >

    <div id="cart-drawer" class="fixed inset-0 z-50 transition-all duration-300 opacity-0 invisible">
        <div onclick="toggleCart()" class="absolute inset-0 bg-black/80 backdrop-blur-md"></div>
        
        <div id="cart-container" class="absolute right-0 top-0 bottom-0 w-full max-w-md bg-black border-l-2 border-blue-600 p-6 flex flex-col shadow-2xl shadow-blue-600/20 transform translate-x-full transition-transform duration-300">
            
            <div class="flex items-center justify-between border-b border-blue-600/30 pb-4 mb-4">
                <div class="flex items-center gap-2">
                    <div class="h-6 w-6 bg-blue-600"></div>
                    <h3 class="text-xl font-black uppercase tracking-widest">Tu Pedido</h3>
                </div>
                <button onclick="toggleCart()" class="p-2 rounded-lg bg-blue-600/20 text-gray-400 hover:text-white transition font-bold">
                    ✕
                </button>
            </div>

            <div id="cart-items" class="flex-1 overflow-y-auto py-4 space-y-4 no-scrollbar">
                <div id="cart-empty" class="h-full flex flex-col items-center justify-center text-center py-12 text-gray-500">
                    <p class="text-lg font-bold">Tu carrito está vacío</p>
                    <p class="text-xs mt-1">¡Agrega combos deliciosos!</p>
                </div>
            </div>

            <div id="delivery-section" class="hidden border-t border-blue-600/30 pt-4">
                <button onclick="toggleDeliverySection()" class="w-full flex items-center justify-between mb-4 hover:bg-blue-600/10 p-2 rounded transition -ml-2 -mr-2">
                    <label class="text-sm font-black uppercase tracking-wider text-gray-400 cursor-pointer">Tipo de Entrega</label>
                    <span id="delivery-toggle-icon" class="collapse-icon text-blue-400 text-lg">▼</span>
                </button>

                <div id="delivery-content" class="space-y-4 transition-all max-h-0 overflow-hidden opacity-0">
                    <div class="grid grid-cols-2 gap-3">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="delivery_type" value="pickup" onchange="updateDeliveryType('pickup')" class="w-4 h-4 accent-blue-600">
                            <span class="text-sm font-black uppercase">🏪 Pick up</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="delivery_type" value="delivery" onchange="updateDeliveryType('delivery')" class="w-4 h-4 accent-blue-600">
                            <span class="text-sm font-black uppercase">🚗 Delivery</span>
                        </label>
                    </div>

                    <div id="delivery-zones" class="hidden">
                        <label class="text-sm font-black uppercase tracking-wider text-gray-400 mb-3 block">Área de Entrega</label>
                        <div id="zones-container" class="space-y-2"></div>
                    </div>

                    <div id="delivery-cost-display" class="hidden bg-blue-600/10 border border-blue-600/30 rounded-lg p-3">
                        <div class="flex justify-between items-center">
                            <span class="text-xs font-black uppercase text-gray-400">Costo Delivery:</span>
                            <span id="delivery-cost" class="text-lg font-black text-blue-400">+$0.00</span>
                        </div>
                    </div>
                </div>
            </div>

            <div id="payment-section" class="hidden border-t border-blue-600/30 pt-4">
                <button onclick="togglePaymentSection()" class="w-full flex items-center justify-between mb-4 hover:bg-blue-600/10 p-2 rounded transition -ml-2 -mr-2">
                    <label class="text-sm font-black uppercase tracking-wider text-gray-400 cursor-pointer">💳 Datos de Pago</label>
                    <span id="payment-toggle-icon" class="collapse-icon text-blue-400 text-lg">▼</span>
                </button>

                <div id="payment-content" class="space-y-3 transition-all max-h-0 overflow-hidden opacity-0">
                    <div>
                        <div class="inline-block bg-blue-600 text-white px-3 py-1 rounded-lg font-black text-xs mb-3">
                            Transferencia / Pago Móvil
                        </div>
                        
                        <div class="space-y-2 text-xs">
                            <div class="flex items-start gap-2 bg-blue-600/10 p-2 rounded">
                                <span class="font-black text-blue-400 min-w-fit">Beneficiario:</span>
                                <div class="flex-1">
                                    <p class="font-black text-gray-300">AEREOGASTROBAR</p>
                                    <button onclick="copyToClipboard('Marcos a. Andrade')" class="text-xs text-blue-400 hover:text-blue-300 font-bold">📋 Copiar</button>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-2 bg-blue-600/10 p-2 rounded">
                                <span class="font-black text-blue-400 min-w-fit">Cedula / RIF:</span>
                                <div class="flex-1">
                                    <p class="font-black text-gray-300">V-17.172.411</p>
                                    <button onclick="copyToClipboard('17.172.411')" class="text-xs text-blue-400 hover:text-blue-300 font-bold">📋 Copiar</button>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-2 bg-blue-600/10 p-2 rounded">
                                <span class="font-black text-blue-400 min-w-fit">Banco:</span>
                                <div class="flex-1">
                                    <p class="font-black text-gray-300">BANCO DE VENEZUELA</p>
                                    <button onclick="copyToClipboard('BANCO DE VENEZUELA')" class="text-xs text-blue-400 hover:text-blue-300 font-bold">📋 Copiar</button>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-2 bg-blue-600/10 p-2 rounded">
                                <span class="font-black text-blue-400 min-w-fit">Teléfono:</span>
                                <div class="flex-1">
                                    <p class="font-black text-gray-300">0412-8536279</p>
                                    <button onclick="copyToClipboard('0412-8536279')" class="text-xs text-blue-400 hover:text-blue-300 font-bold">📋 Copiar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-blue-600/30 pt-4 space-y-3 mt-4">
                <div class="flex justify-between items-center">
                    <span class="text-sm font-black uppercase tracking-wider text-gray-400">Total USD:</span>
                    <span id="total-usd" class="text-2xl font-black text-blue-400">$0.00</span>
                </div>
                <div class="flex justify-between items-center bg-blue-600/10 p-3 rounded-lg border border-blue-600/30">
                    <span class="text-xs font-black uppercase text-gray-400">Equivalente Bs:</span>
                    <span id="total-bs" class="text-base font-black text-white">Bs 0.00</span>
                </div>

                <button onclick="sendOrderWhatsApp()" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-lg font-black uppercase tracking-wider shadow-lg shadow-blue-600/50 transition-all flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.885-.79-1.487-1.768-1.66-2.065-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.006c-1.052 0-2.082.395-2.836 1.109-.757.715-1.176 1.668-1.176 2.667 0 2.592 2.105 4.627 4.679 4.627.95 0 1.857-.23 2.672-.678l.041-.024c.308-.179.595-.355.86-.581 1.287-1.063 1.998-2.582 1.998-4.222.005-2.592-2.105-4.627-4.679-4.627l.006.022z"/>
                    </svg>
                    Enviar Pedido
                </button>
            </div>
        </div>
    </div>

    <script>
        const TASA_CAMBIO = parseFloat("{{ $exchangeRate }}") || 40.00;
        const DEFAULT_PRODUCTS = @json($products->toArray());
        const DELIVERY_ZONES = @json($zones->toArray());
        let products = [...DEFAULT_PRODUCTS];
        let cart = [];
        let cartOpen = false;
        let deliveryExpanded = false;
        let paymentExpanded = false;
        
        let orderData = {
            deliveryType: null,
            selectedZone: null,
            deliveryCost: 0
        };

        // Inicialización de componentes al cargar el DOM
        renderProducts();
        updateCartUI();
        setActiveFilter('all');
        loadDeliveryZones();

        function loadDeliveryZones() {
            const zonesContainer = document.getElementById('zones-container');
            if(!zonesContainer) return;
            zonesContainer.innerHTML = '';

            if(DELIVERY_ZONES.length === 0) {
                zonesContainer.innerHTML = '<p class="text-xs text-gray-500">No hay zonas de entrega disponibles</p>';
                return;
            }

            DELIVERY_ZONES.forEach(zone => {
                const label = document.createElement('label');
                label.className = 'flex items-center gap-2 cursor-pointer p-2 rounded-lg hover:bg-white/5 transition';
                label.innerHTML = `
                    <input type="radio" name="delivery_zone" value="${zone.id}" onchange="updateDeliveryZone('${zone.name}', ${zone.cost})" class="w-4 h-4 accent-blue-600">
                    <div class="flex-1">
                        <span class="text-sm font-black uppercase text-white">${zone.name}</span>
                        <p class="text-xs text-blue-400">+$${parseFloat(zone.cost).toFixed(2)}</p>
                    </div>
                `;
                zonesContainer.appendChild(label);
            });
        }

        function toggleDeliverySection() {
            deliveryExpanded = !deliveryExpanded;
            const content = document.getElementById('delivery-content');
            const icon = document.getElementById('delivery-toggle-icon');
            
            if(deliveryExpanded) {
                content.style.maxHeight = '500px';
                content.style.opacity = '1';
                icon.classList.add('open');
            } else {
                content.style.maxHeight = '0';
                content.style.opacity = '0';
                icon.classList.remove('open');
            }
        }

        function togglePaymentSection() {
            paymentExpanded = !paymentExpanded;
            const content = document.getElementById('payment-content');
            const icon = document.getElementById('payment-toggle-icon');
            
            if(paymentExpanded) {
                content.style.maxHeight = '500px';
                content.style.opacity = '1';
                icon.classList.add('open');
            } else {
                content.style.maxHeight = '0';
                content.style.opacity = '0';
                icon.classList.remove('open');
            }
        }

        function updateDeliveryType(type) {
            orderData.deliveryType = type;
            const zonesSection = document.getElementById('delivery-zones');
            const costDisplay = document.getElementById('delivery-cost-display');

            if(type === 'delivery') {
                zonesSection.classList.remove('hidden');
                costDisplay.classList.remove('hidden');
            } else {
                zonesSection.classList.add('hidden');
                costDisplay.classList.add('hidden');
                orderData.selectedZone = null;
                orderData.deliveryCost = 0;
                document.querySelectorAll('input[name="delivery_zone"]').forEach(input => input.checked = false);
            }
            updateCartUI();
        }

        function updateDeliveryZone(zoneName, zoneCost) {
            orderData.selectedZone = zoneName;
            orderData.deliveryCost = parseFloat(zoneCost);
            document.getElementById('delivery-cost').innerText = `+$${orderData.deliveryCost.toFixed(2)}`;
            updateCartUI();
        }

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                alert('✅ Copiado: ' + text);
            }).catch(err => {
                console.error('Error al copiar:', err);
            });
        }

        // FUNCIÓN FILTRAR CORREGIDA: Convierte a Slugs usando el objeto relacional category
        function filterMenu(categorySlug) {
            if (categorySlug === 'all') {
                products = [...DEFAULT_PRODUCTS];
            } else {
                products = DEFAULT_PRODUCTS.filter(product => {
                    if (!product.category || !product.category.name) return false;
                    
                    let productSlug = product.category.name
                        .toLowerCase()
                        .trim()
                        .replace(/[^a-z0-9 -]/g, '')
                        .replace(/\s+/g, '-')
                        .replace(/-+/g, '-');

                    return productSlug === categorySlug;
                });
            }

            renderProducts();
            setActiveFilter(categorySlug);
        }

        function setActiveFilter(category) {
            document.querySelectorAll('[data-filter]').forEach(button => {
                if (button.dataset.filter === category) {
                    button.classList.add('bg-blue-600', 'text-white', 'border-blue-600');
                    button.classList.remove('bg-transparent', 'text-gray-300', 'border-blue-600/30');
                } else {
                    button.classList.remove('bg-blue-600', 'text-white', 'border-blue-600');
                    button.classList.add('bg-transparent', 'text-gray-300', 'border-blue-600/30');
                }
            });
        }

        // RENDERIZAR PRODUCTOS CORREGIDO: Mapea la relación category de Eloquent
        function renderProducts() {
            const productsGrid = document.getElementById('products-grid');
            if(!productsGrid) return;

            if(products.length === 0) {
                productsGrid.innerHTML = `
                    <div class="col-span-full rounded-3xl border border-blue-600/30 bg-white/5 p-8 text-center text-sm text-gray-300">
                        No hay productos disponibles en esta categoría.
                    </div>`;
                return;
            }

            productsGrid.innerHTML = products.map(product => {
                const priceBs = (product.price_usd * TASA_CAMBIO).toLocaleString('es-VE', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const categoryName = product.category ? product.category.name : 'General';
                const categoryIcon = product.category && product.category.icon ? product.category.icon : '🍔';

                return `
                    <article class="group overflow-hidden rounded-lg border border-blue-600/30 bg-gradient-to-br from-white/5 to-white/[0.02] shadow-xl transition-all duration-300 hover:border-blue-600/60 hover:shadow-2xl hover:shadow-blue-600/20">
                        <div class="relative h-64 overflow-hidden bg-gradient-to-br from-gray-900 to-black sm:h-72">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 to-transparent flex items-center justify-center font-bold text-gray-600 text-xl">${categoryIcon} ${categoryName}</div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent"></div>
                            <span class="absolute left-4 top-4 rounded-lg border border-blue-400 bg-black/70 px-3 py-1 text-xs font-black uppercase tracking-widest text-blue-400">${product.tag || '✨'}</span>
                            <div class="absolute bottom-4 left-4 right-4 flex items-end justify-between gap-3">
                                <div class="max-w-[58%]">
                                    <p class="text-xs font-black uppercase tracking-widest text-blue-400">${product.badge || '⭐'}</p>
                                    <h3 class="mt-1 text-2xl font-black uppercase leading-tight tracking-tight text-white sm:text-3xl">${product.name}</h3>
                                </div>
                                <div class="rounded-lg bg-blue-600 px-4 py-3 text-right text-white shadow-lg">
                                    <p class="text-2xl font-black leading-none">$${product.price_usd.toFixed(2)}</p>
                                    <div class="mt-2 border-t border-blue-400/30 pt-2">
                                        <p class="text-xs font-black leading-none">Bs ${priceBs}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-5 sm:p-6">
                            <p class="min-h-[56px] text-sm leading-relaxed text-gray-300 sm:text-base">
                                ${product.description || 'Deliciosa opción del menú'}
                            </p>
                            <button type="button" onclick="addToCart(${product.id})" class="mt-6 flex w-full items-center justify-center gap-2 rounded-lg bg-blue-600 hover:bg-blue-700 px-4 py-3 font-black uppercase tracking-wider text-white transition-all shadow-lg shadow-blue-600/50 hover:shadow-blue-600/77">
                                🛒 Agregar al carrito
                            </button>
                        </div>
                    </article>`;
            }).join('');
        }

        function toggleCart() {
            const drawer = document.getElementById('cart-drawer');
            const container = document.getElementById('cart-container');
            cartOpen = !cartOpen;

            if(cartOpen) {
                drawer.classList.remove('opacity-0', 'invisible');
                container.classList.remove('translate-x-full');
            } else {
                drawer.classList.add('opacity-0', 'invisible');
                container.classList.add('translate-x-full');
            }
        }

        function addToCart(id) {
            const product = DEFAULT_PRODUCTS.find(item => item.id === id);
            if(!product) return;

            const existingItem = cart.find(item => item.id === id);

            if(existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({ id: product.id, name: product.name, price: parseFloat(product.price_usd), quantity: 1, note: '' });
            }

            updateCartUI();
            const badge = document.getElementById('cart-badge');
            if(badge) {
                badge.classList.add('scale-125');
                setTimeout(() => badge.classList.remove('scale-125'), 200);
            }
        }

        function changeQuantity(id, delta) {
            const item = cart.find(item => item.id === id);
            if(!item) return;

            item.quantity += delta;
            if(item.quantity <= 0) {
                cart = cart.filter(item => item.id !== id);
            }
            updateCartUI();
        }

        function removeItem(id) {
            cart = cart.filter(item => item.id !== id);
            updateCartUI();
        }

        function updateItemNote(id, noteText) {
            const item = cart.find(item => item.id === id);
            if(item) {
                item.note = noteText;
            }
        }

        // ACTUALIZACIÓN DE INTERFAZ DEL CARRITO COMPLETO Y CORREGIDO
        function updateCartUI() {
            const itemsContainer = document.getElementById('cart-items');
            const badge = document.getElementById('cart-badge');
            const deliverySection = document.getElementById('delivery-section');
            const paymentSection = document.getElementById('payment-section');

            const totalItems = cart.reduce((acc, item) => acc + item.quantity, 0);
            
            if(totalItems > 0) {
                badge.innerText = totalItems;
                badge.classList.remove('hidden');
                badge.classList.add('flex');
                deliverySection.classList.remove('hidden');
                paymentSection.classList.remove('hidden');

                itemsContainer.innerHTML = cart.map(item => `
                    <div class="flex flex-col gap-2 bg-white/5 p-3 rounded-lg border border-blue-600/20">
                        <div class="flex items-start justify-between gap-2">
                            <div class="flex-1">
                                <p class="text-sm font-black uppercase text-white">${item.name}</p>
                                <p class="text-xs text-blue-400">$${item.price.toFixed(2)} c/u</p>
                            </div>
                            <button onclick="removeItem(${item.id})" class="text-gray-500 hover:text-red-400 text-xs font-bold">Quitar</button>
                        </div>
                        <input type="text" placeholder="Nota: Sin cebolla, extra salsa..." value="${item.note}" onchange="updateItemNote(${item.id}, this.value)" class="w-full bg-black border border-blue-600/20 rounded p-1.5 text-xs text-gray-300 focus:outline-none focus:border-blue-600">
                        <div class="flex justify-between items-center mt-1">
                            <div class="flex items-center gap-1 bg-black border border-blue-600/30 rounded-lg p-0.5">
                                <button onclick="changeQuantity(${item.id}, -1)" class="w-7 h-7 flex items-center justify-center font-black text-gray-400 hover:text-white">-</button>
                                <span class="w-8 text-center text-xs font-black">${item.quantity}</span>
                                <button onclick="changeQuantity(${item.id}, 1)" class="w-7 h-7 flex items-center justify-center font-black text-gray-400 hover:text-white">+</button>
                            </div>
                            <span class="text-sm font-black text-white">$${(item.price * item.quantity).toFixed(2)}</span>
                        </div>
                    </div>
                `).join('');
            } else {
                badge.classList.add('hidden');
                badge.classList.remove('flex');
                deliverySection.classList.add('hidden');
                paymentSection.classList.add('hidden');
                itemsContainer.innerHTML = `
                    <div id="cart-empty" class="h-full flex flex-col items-center justify-center text-center py-12 text-gray-500">
                        <p class="text-lg font-bold">Tu carrito está vacío</p>
                        <p class="text-xs mt-1">¡Agrega combos deliciosos!</p>
                    </div>`;
            }

            // Cálculo de totales final
            const subtotalUSD = cart.reduce((acc, item) => acc + (item.price * item.quantity), 0);
            const totalUSD = subtotalUSD + orderData.deliveryCost;
            const totalBs = totalUSD * TASA_CAMBIO;

            document.getElementById('total-usd').innerText = `$${totalUSD.toFixed(2)}`;
            document.getElementById('total-bs').innerText = `Bs ${totalBs.toLocaleString('es-VE', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
        }

        // ENVÍO DE DATOS ESTRUCTURADOS HACIA WHATSAPP
        function sendOrderWhatsApp() {
            if(cart.length === 0) {
                alert('El carrito está vacío');
                return;
            }

            if(!orderData.deliveryType) {
                alert('Por favor selecciona el tipo de entrega (Pick up o Delivery)');
                toggleDeliverySection();
                return;
            }

            if(orderData.deliveryType === 'delivery' && !orderData.selectedZone) {
                alert('Por favor selecciona un área de entrega para el Delivery');
                return;
            }

            let message = `🚀 *NUEVO PEDIDO - AEREO GASTROBAR*\n`;
            message += `-------------------------------------------\n\n`;
            
            cart.forEach(item => {
                message += `▪️ *${item.quantity}x* ${item.name} ($${(item.price * item.quantity).toFixed(2)})\n`;
                if(item.note.trim() !== '') {
                    message += `   _Nota: ${item.note}_\n`;
                }
                message += `\n`;
            });

            message += `-------------------------------------------\n`;
            message += `🏪 *Tipo de Entrega:* ${orderData.deliveryType === 'pickup' ? 'Pick Up en Tienda' : 'Delivery'}\n`;
            
            if(orderData.deliveryType === 'delivery') {
                message += `📍 *Zona de Entrega:* ${orderData.selectedZone}\n`;
                message += `🚗 *Costo de Envío:* $${orderData.deliveryCost.toFixed(2)}\n`;
            }

            const subtotalUSD = cart.reduce((acc, item) => acc + (item.price * item.quantity), 0);
            const totalUSD = subtotalUSD + orderData.deliveryCost;
            const totalBs = totalUSD * TASA_CAMBIO;

            message += `\n💵 *TOTAL A PAGAR:* $${totalUSD.toFixed(2)}\n`;
            message += `🇻🇪 *Equivalente en Bs:* ${totalBs.toLocaleString('es-VE', { minimumFractionDigits: 2 })} Bs\n\n`;
            message += `-------------------------------------------\n`;
            message += `👉 _Indícanos tu nombre, dirección detallada (si aplica) y tu capture de pago para procesar la orden._`;

            const encodedText = encodeURIComponent(message);
            window.open(`https://wa.me/584141427822?text=${encodedText}`, '_blank');
        }
    </script>
</body>
</html>