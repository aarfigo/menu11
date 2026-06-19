<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\DeliveryZone;
use App\Models\Settings; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function menu()
    {
        $products = Product::where('is_active', true)
            ->with('category') 
            ->get();

        $categories = Category::where('is_active', true)
            ->orderBy('order')
            ->get();

        $zones = DeliveryZone::where('is_active', true)->get();
        $exchangeRate = Settings::get('exchange_rate', 40.00);

        return view('menu', compact('products', 'categories', 'zones', 'exchangeRate'));
    }

    public function index()
    {
        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => Product::where('is_active', true)
                    ->with('category')
                    ->get(),
                'message' => 'Productos obtenidos exitosamente'
            ]);
        }

        $products = Product::with('category')->get();
        $categories = Category::orderBy('order')->get();
        $exchangeRate = Settings::get('exchange_rate', 40.00);

        return view('admin.index', compact('products', 'categories', 'exchangeRate'));
    }

    public function show($id)
    {
        $product = Product::with('category')->find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Producto no encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $product
        ]);
    }

    protected function normalizeProductData(Request $request, $product = null): array
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_usd' => 'required|numeric|min:0',
            'price' => 'nullable|numeric|min:0',
            'price_bs' => 'nullable|numeric|min:0',
            'category_id' => 'required|integer|exists:categories,id',
            'tag' => 'nullable|string|max:100',
            'badge' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'remove_image' => 'nullable|boolean',
        ]);

        // ✅ Manejar is_active correctamente
        if ($request->has('is_active')) {
            $validated['is_active'] = true;
        } elseif ($product) {
            $validated['is_active'] = $product->is_active; 
        } else {
            $validated['is_active'] = true;
        }

        // ✅ MEJORADO: Lógica completa de imágenes con eliminación explícita
        
        // Caso 1: Solicitud de eliminar imagen
        if ($request->has('remove_image') && $request->remove_image == '1') {
            if ($product && $product->image_url) {
                $oldPath = str_replace('/storage/', '', $product->image_url);
                Storage::disk('public')->delete($oldPath);
            }
            $validated['image_url'] = null;
        }
        // Caso 2: Nueva imagen subida (reemplaza anterior)
        elseif ($request->hasFile('image')) {
            // Eliminar imagen anterior si existe
            if ($product && $product->image_url) {
                $oldPath = str_replace('/storage/', '', $product->image_url);
                Storage::disk('public')->delete($oldPath);
            }

            // Guardar nueva imagen
            $path = $request->file('image')->store('products', 'public');
            $validated['image_url'] = Storage::url($path);
        }
        // Caso 3: Sin cambios de imagen (mantener la existente)
        else {
            if ($product && $product->image_url) {
                $validated['image_url'] = $product->image_url;
            } else {
                $validated['image_url'] = null;
            }
        }

        // Convertir price a price_usd si se envía
        if ($request->filled('price')) {
            $validated['price_usd'] = $validated['price'];
            unset($validated['price']);
        }

        // Calcular price_bs automáticamente si no se proporciona
        if (!$request->filled('price_bs') || $request->price_bs == 0) {
            $exchangeRate = Settings::get('exchange_rate', 40.00);
            $validated['price_bs'] = $validated['price_usd'] * $exchangeRate;
        }

        // NO incluir 'category' en el array validado
        if (isset($validated['category'])) {
            unset($validated['category']);
        }

        // NO incluir 'remove_image' en el array (no es columna de BD)
        if (isset($validated['remove_image'])) {
            unset($validated['remove_image']);
        }

        return $validated;
    }

    public function store(Request $request)
    {
        $validated = $this->normalizeProductData($request);
        $product = Product::create($validated);

        if ($request->wantsJson()) {
            $product->load('category');
            return response()->json([
                'success' => true,
                'data' => $product,
                'message' => 'Producto creado exitosamente'
            ], 201);
        }

        return redirect()->back()->with('success', 'Producto creado exitosamente');
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            if ($request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Producto no encontrado'], 404);
            }
            return redirect()->back()->withErrors(['Producto no encontrado']);
        }

        $validated = $this->normalizeProductData($request, $product);
        $product->update($validated);

        if ($request->wantsJson()) {
            $product->load('category');
            return response()->json([
                'success' => true,
                'data' => $product,
                'message' => 'Producto actualizado exitosamente'
            ]);
        }

        return redirect()->back()->with('success', 'Producto actualizado exitosamente');
    }

    public function destroy(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            if ($request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Producto no encontrado'], 404);
            }
            return redirect()->back()->withErrors(['Producto no encontrado']);
        }

        // Eliminar imagen si existe
        if ($product->image_url) {
            $oldPath = str_replace('/storage/', '', $product->image_url);
            Storage::disk('public')->delete($oldPath);
        }

        $product->delete();

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Producto eliminado exitosamente']);
        }

        return redirect()->back()->with('success', 'Producto eliminado exitosamente');
    }

    public function byCategory($categoryId)
    {
        return response()->json([
            'success' => true,
            'data' => Product::where('category_id', $categoryId)
                ->where('is_active', true)
                ->with('category')
                ->get(),
            'message' => "Productos obtenidos"
        ]);
    }
}
