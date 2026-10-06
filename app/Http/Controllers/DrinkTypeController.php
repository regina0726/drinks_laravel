<?php

namespace App\Http\Controllers;

use App\Models\DrinkType;
use Illuminate\Http\Request;

class DrinkTypeController extends Controller
{
    public function index(Request $request)
    {
        $drinktypes = DrinkType::query()
            ->when($request->filled('needle'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->input('needle') . '%');
            })
            ->orderBy('name')
            ->get();

        return view('drink_types.index', compact('drinktypes'));
    }

    public function create()
    {
        return view('drink_types.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        DrinkType::create($validated);

        return redirect()
            ->route('drinktypes.index')
            ->with('success', 'Kategória létrehozva!');
    }

    public function show(DrinkType $drinktype)
    {
        $drinktype->load('brands');

        return view('drink_types.show', compact('drinktype'));
    }

    public function edit(DrinkType $drinktype)
    {
        return view('drink_types.edit', compact('drinktype'));
    }

    public function update(Request $request, DrinkType $drinktype)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $drinktype->update($validated);

        return redirect()
            ->route('drinktypes.index')
            ->with('success', 'Kategória frissítve!');
    }

    public function destroy(DrinkType $drinktype)
    {
        $drinktype->delete();

        return redirect()
            ->route('drinktypes.index')
            ->with('success', 'Kategória törölve!');
    }
}
