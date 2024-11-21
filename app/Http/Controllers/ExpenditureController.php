<?php

namespace App\Http\Controllers;

use App\Expenditure;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ExpenditureController extends Controller
{
    public function index()
    {
        // Fetch all expenditures ordered by date
        $expenditures = Expenditure::orderBy('date', 'desc')->get();

        // Return the expenditures view with data
        return view('expenditures.index', compact('expenditures'));
    }
    






    public function show($id)
    {
        $expenditure = Expenditure::findOrFail($id);
        return view('expenditures.show', compact('expenditure'));
    }


    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'item' => 'required|string',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'person_name' => 'required|string', // Validate the person_name field
            'description' => 'nullable|string',
        ]);

        // Create the expenditure record
        Expenditure::create([
            'item' => $request->item,
            'amount' => $request->amount,
            'date' => $request->date,
            'person_name' => $request->person_name,
            'description' => $request->description,
        ]);

        // Redirect to the expenditures index
        return redirect()->route('expenditures.index');
    }
}
