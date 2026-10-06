<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\DrinkType;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $brands = Brand::with('drinktype')
            ->when($request->filled('needle'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->input('needle') . '%');
            })
            ->orderBy('name')
            ->get();

        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        $drinktypes = DrinkType::orderBy('name')->get();

        return view('brands.create', compact('drinktypes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        Brand::create($validated);

        return redirect()
            ->route('brands.index')
            ->with('success', 'Márka létrehozva!');
    }

    public function show(Brand $brand)
    {
        $brand->load('drinktype');

        return view('brands.show', compact('brand'));
    }

    public function edit(Brand $brand)
    {
        $drinktypes = DrinkType::orderBy('name')->get();

        return view('brands.edit', compact('brand', 'drinktypes'));
    }

    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate($this->rules());

        $brand->update($validated);

        return redirect()
            ->route('brands.index')
            ->with('success', 'Márka frissítve!');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()
            ->route('brands.index')
            ->with('success', 'Márka törölve!');
    }

    private function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'alcohol_percent' => ['required', 'numeric', 'between:0,100'],
            'drinktype_id' => ['required', 'exists:drinktypes,id'],
        ];
    }
}
