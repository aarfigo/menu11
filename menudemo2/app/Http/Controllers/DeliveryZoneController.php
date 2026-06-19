<?php

namespace App\Http\Controllers;

use App\Models\DeliveryZone;
use Illuminate\Http\Request;

class DeliveryZoneController extends Controller
{
    // Mostrar lista de zonas
    public function index()
    {
        $zones = DeliveryZone::all();
        return view('admin.zones.index', compact('zones'));
    }

    // Mostrar formulario de crear zona
    public function create()
    {
        return view('admin.zones.create');
    }

    // Guardar nueva zona
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'cost' => 'required|numeric|min:0',
            'is_active' => 'boolean',
        ]);

        DeliveryZone::create($validated);

        return redirect()->route('admin.zones.index')->with('success', 'Zona de entrega creada correctamente');
    }

    // Mostrar formulario de editar
    public function edit($id)
    {
        $zone = DeliveryZone::findOrFail($id);
        return view('admin.zones.edit', compact('zone'));
    }

    // Actualizar zona
    public function update(Request $request, $id)
    {
        $zone = DeliveryZone::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'cost' => 'required|numeric|min:0',
            'is_active' => 'boolean',
        ]);

        $zone->update($validated);

        return redirect()->route('admin.zones.index')->with('success', 'Zona de entrega actualizada correctamente');
    }

    // Eliminar zona
    public function destroy($id)
    {
        $zone = DeliveryZone::findOrFail($id);
        $zone->delete();

        return redirect()->route('admin.zones.index')->with('success', 'Zona de entrega eliminada correctamente');
    }

    // Obtener zonas activas (para la API)
    public function getActive()
    {
        $zones = DeliveryZone::where('is_active', true)->get();
        return response()->json($zones);
    }
}
