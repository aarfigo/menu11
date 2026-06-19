<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $exchangeRate = Settings::get('exchange_rate', 40.00);
        $whatsappNumber = Settings::get('whatsapp_number', '');
        $businessEmail = Settings::get('business_email', '');

        return view('admin.settings.index', compact('exchangeRate', 'whatsappNumber', 'businessEmail'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'exchange_rate' => 'required|numeric|min:0.01',
            'whatsapp_number' => 'nullable|string|max:20',
            'business_email' => 'nullable|email',
        ]);

        Settings::set('exchange_rate', $validated['exchange_rate'], 'Tasa de cambio USD a BS');
        Settings::set('whatsapp_number', $validated['whatsapp_number'] ?? '', 'Número de WhatsApp');
        Settings::set('business_email', $validated['business_email'] ?? '', 'Email de negocio');

        return redirect()->back()->with('success', 'Configuración actualizada correctamente');
    }

    public function getExchangeRate()
    {
        $exchangeRate = Settings::get('exchange_rate', 40.00);
        
        return response()->json([
            'exchange_rate' => (float)$exchangeRate
        ]);
    }
}
