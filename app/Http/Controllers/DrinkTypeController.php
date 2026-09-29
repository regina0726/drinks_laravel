<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DrinkType;

class DrinkTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drinktypes = DrinkType::get();

    return view('drink_types.index', compact('drinktypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('drink_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $drinktype = DrinkType::create($validated);
        $drinktypes = DrinkType::all();

        return redirect()
            ->route('drinktypes.index')
            ->with('success', 'Kategória létrehozva!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DrinkType $drinktype)
    {
        return view('drink_types.show', compact('drinktype'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DrinkType $drinktype)
    {
        return view('drink_types.edit', compact('drinktype'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DrinkType $drinktype)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $drinktype->update($validated);

        $drinktypes = DrinkType::all();

        return redirect()
            ->route('drinktypes.index')
            ->with('success', 'Kategória frissítve!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DrinkType $drinktype)
    {
        $drinktype->delete();

        return redirect()
            ->route('drinktypes.index')
            ->with('status', 'Kategória törölve!');
    }
}
