<?php

namespace App\Http\Controllers;

use App\FeeStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeeStructureController extends Controller
{
    public function create()
    {
        $feeStructure = FeeStructure::all()->count();

        if ($feeStructure < 5 && Auth::guard('staff')->check() && Auth::guard('staff')->user()->role === 'principal') {
            return view('fee_structures.create');
        } else {
            return redirect()->back();
        }
        
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'department' => 'required|string|unique:fee_structures,department',
            'semester1_fee' => 'required|numeric',
            'semester2_fee' => 'required|numeric',
            'semester3_fee' => 'required|numeric',
            'semester4_fee' => 'required|numeric',
            'semester5_fee' => 'required|numeric',
            'semester6_fee' => 'required|numeric',
        ]);

        // Create the new fee structure
        FeeStructure::create([
            'department' => $request->department,
            'semester1_fee' => $request->semester1_fee,
            'semester2_fee' => $request->semester2_fee,
            'semester3_fee' => $request->semester3_fee,
            'semester4_fee' => $request->semester4_fee,
            'semester5_fee' => $request->semester5_fee,
            'semester6_fee' => $request->semester6_fee,
        ]);

        return redirect()->route('fee_structures.index')->with('success', 'Fee structure created successfully.');
    }

    public function index()
    {
        $feeStructures = FeeStructure::all();
        $feeStructureCount = $feeStructures->count();
        return view('fee_structures.index', compact('feeStructures', 'feeStructureCount'));
    }

    public function edit($id)
    {
        $feeStructure = FeeStructure::findOrFail($id);
        return view('fee_structures.edit', compact('feeStructure'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'department' => 'required|string',
            'semester1_fee' => 'required|numeric',
            'semester2_fee' => 'required|numeric',
            'semester3_fee' => 'required|numeric',
            'semester4_fee' => 'required|numeric',
            'semester5_fee' => 'required|numeric',
            'semester6_fee' => 'required|numeric',
        ]);

        $feeStructure = FeeStructure::findOrFail($id);
        $feeStructure->update($request->all());

        return redirect()->route('fee_structures.index')->with('success', 'Fee structure updated successfully!');
    }
}
