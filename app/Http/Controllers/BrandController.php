<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\DrinkType;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::with('drinktype')->get();

        return view('brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $drinktypes = DrinkType::all();

        return view('brands.create', compact('drinktypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'alcohol_percent' => ['required', 'string', 'max:20'],
            'drinktype_id' => ['required', 'exists:drinktypes,id'],
        ]);

        Brand::create($validated);

        return redirect()
            ->route('brands.index')
            ->with('status', 'Márka létrehozva!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view('brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'alcohol_percent' => ['required', 'string', 'max:20'],
            'drinktype_id' => ['required', 'exists:drinktypes,id'],
        ]);

        $brand->update($validated);

        return redirect()
        ->route('brands.index')
        ->with('status', 'Márka frissítve!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()
            ->route('brands.index')
            ->with('status', 'Márka törölve!');
    }
}
