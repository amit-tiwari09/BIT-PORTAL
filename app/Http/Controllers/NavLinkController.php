<?php

namespace App\Http\Controllers;

use App\NavLink;
use Illuminate\Http\Request;

class NavLinkController extends Controller
{
    // Display the list of nav links
    public function index()
    {
        $links = NavLink::all();
        return view('nav_links.index', compact('links'));
    }

    // Show the form for creating a new nav link
    public function create()
    {
        return view('nav_links.create');
    }

    // Store a newly created nav link
    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|max:255|unique:nav_links',
            'value' => 'required|url',
        ]);

        NavLink::create($request->all());

        return redirect()->route('nav_links.index')->with('success', 'Nav link added successfully!');
    }

    // Show the form for editing a specific nav link
    public function edit($id)
    {
        $link = NavLink::findOrFail($id);
        return view('nav_links.edit', compact('link'));
    }

    // Update the specified nav link
    public function update(Request $request, $id)
    {
        $request->validate([
            'key' => 'required|string|max:255|unique:nav_links,key,' . $id,
            'value' => 'required|url',
        ]);

        $link = NavLink::findOrFail($id);
        $link->update($request->all());

        return redirect()->route('nav_links.index')->with('success', 'Nav link updated successfully!');
    }

    // Remove the specified nav link
    public function destroy($id)
    {
        $link = NavLink::findOrFail($id);
        $link->delete();

        return redirect()->route('nav_links.index')->with('success', 'Nav link deleted successfully!');
    }
}
