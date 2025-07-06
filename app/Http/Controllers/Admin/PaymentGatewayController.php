<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentGateway;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentGatewayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $paymentGateways = PaymentGateway::latest()->paginate(10);

        return view('admin.payment-gateways.index', compact('paymentGateways'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.payment-gateways.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'api_key' => 'required|string|max:255',
            'status' => 'boolean',
        ]);

        PaymentGateway::create($validated);

        return redirect()->route('admin.payment-gateways.index')
            ->with('success', 'Payment gateway created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentGateway $paymentGateway): View
    {
        return view('admin.payment-gateways.show', compact('paymentGateway'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentGateway $paymentGateway): View
    {
        return view('admin.payment-gateways.edit', compact('paymentGateway'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentGateway $paymentGateway): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'api_key' => 'required|string|max:255',
            'status' => 'boolean',
        ]);

        $paymentGateway->update($validated);

        return redirect()->route('admin.payment-gateways.index')
            ->with('success', 'Payment gateway updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentGateway $paymentGateway): RedirectResponse
    {
        $paymentGateway->delete();

        return redirect()->route('admin.payment-gateways.index')
            ->with('success', 'Payment gateway deleted successfully.');
    }
}
