<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::latest()->paginate(10);
        $title = 'Vendor';
        return view('page.vendor.index', compact('vendors', 'title'));
    }

    public function create()
    {
        $title = 'Vendor';
        return view('page.vendor.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:vendors',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'description' => 'nullable|string'
        ]);

        Vendor::create($request->all());

        return redirect()->route('vendors.index')
            ->with('success', 'Vendor created successfully.');
    }

    public function edit(Vendor $vendor)
    {
        $title = 'Vendor';
        return view('page.vendor.edit', compact('vendor', 'title'));
    }

    public function update(Request $request, Vendor $vendor)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:vendors,name,' . $vendor->id,
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'description' => 'nullable|string'
        ]);

        $vendor->update($request->all());

        return redirect()->route('vendors.index')
            ->with('success', 'Vendor updated successfully.');
    }

    public function destroy(Vendor $vendor)
    {
        $vendor->delete();

        return redirect()->route('vendors.index')
            ->with('success', 'Vendor deleted successfully.');
    }

    public function autoComplete(Request $request)
    {
        $query = $request->get('q');
        $vendors = Vendor::where('name', 'like', "%{$query}%")
            ->where('is_active', true)
            ->get(['id', 'name']);

        return response()->json($vendors);
    }
} 