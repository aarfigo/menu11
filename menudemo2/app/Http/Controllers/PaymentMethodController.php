<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethod::orderBy('order')->get();
        return view('admin.payment-methods.index', compact('paymentMethods'));
    }

    public function create()
    {
        return view('admin.payment-methods.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'beneficiary' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:255',
            'bank_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'icon' => 'nullable|string|max:10',
            'is_active' => 'boolean',
        ]);

        $validated['icon'] = $validated['icon'] ?? '💳';
        $validated['order'] = PaymentMethod::max('order') + 1;

        PaymentMethod::create($validated);

        return redirect()->route('admin.payment-methods.index')->with('success', 'Método de pago creado correctamente');
    }

    public function edit($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        return view('admin.payment-methods.edit', compact('paymentMethod'));
    }

    public function update(Request $request, $id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'beneficiary' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:255',
            'bank_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'icon' => 'nullable|string|max:10',
            'is_active' => 'boolean',
        ]);

        $validated['icon'] = $validated['icon'] ?? '💳';

        $paymentMethod->update($validated);

        return redirect()->route('admin.payment-methods.index')->with('success', 'Método de pago actualizado correctamente');
    }

    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        $paymentMethod->delete();

        return redirect()->route('admin.payment-methods.index')->with('success', 'Método de pago eliminado correctamente');
    }

    public function getActive()
    {
        return response()->json(PaymentMethod::active());
    }
}
