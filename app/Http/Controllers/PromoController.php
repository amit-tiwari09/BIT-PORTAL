<?php

namespace App\Http\Controllers;


use App\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index()
    {
        $promos = Promo::all();
        return view('promos.index', compact('promos'));
    }

    public function create()
    {
        return view('promos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'required|string|max:50',
            'button_link' => 'required|url'
        ]);

        Promo::create($request->all());
        return redirect()->route('promos.index')->with('success', 'Promo created successfully');
    }

    public function edit(Promo $promo)
    {
        return view('promos.edit', compact('promo'));
    }

    public function update(Request $request, Promo $promo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'required|string|max:50',
            'button_link' => 'required|url'
        ]);

        $promo->update($request->all());
        return redirect()->route('promos.index')->with('success', 'Promo updated successfully');
    }

    public function destroy(Promo $promo)
    {
        $promo->delete();
        return redirect()->route('promos.index')->with('success', 'Promo deleted successfully');
    }
}
