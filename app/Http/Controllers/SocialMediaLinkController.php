<?php

namespace App\Http\Controllers;

use App\SocialMediaLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SocialMediaLinkController extends Controller
{
    // Display a listing of the social media links.
    public function index()
    {
        $links = SocialMediaLink::all();
        return view('social_media_links.index', compact('links'));
    }

    // Show the form for creating a new social media link.
    public function create()
    {
        return view('social_media_links.create');
    }

    // Store a newly created social media link in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
            'image' => 'required', // Ensure it's an image
        ]);
    
        // Generate a unique name for the image
        $uniqueName = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
    
        // Move the image to public/pictures directory
        $destinationPath = public_path('pictures'); // Set the destination path
        $request->file('image')->move($destinationPath, $uniqueName);
    
        // Create the social media link
        SocialMediaLink::create([
            'name' => $request->name,
            'url' => $request->url,
            'image' => $uniqueName, // Store the unique name in the database
        ]);
    
        return redirect()->route('social_media_links.index')->with('success', 'Link added successfully!');
    }
    

    // Show the form for editing the specified social media link.
    public function edit($id)
    {
        $link = SocialMediaLink::findOrFail($id);
        return view('social_media_links.edit', compact('link'));
    }

    // Update the specified social media link in storage.
    public function update(Request $request, $id)
    {
        $link = SocialMediaLink::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
            'image' => 'sometimes|image|max:2048',
        ]);

        // Update the fields
        $link->name = $request->name;
        $link->url = $request->url;

        // If a new image is uploaded, process it
        if ($request->hasFile('image')) {
            // Generate a unique name for the new image
            $uniqueName = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            // Store the new image in public/pictures directory
            $request->file('image')->storeAs('pictures', $uniqueName, 'public');
            $link->image = $uniqueName; // Store the unique name in the database
        }

        // Save the link
        $link->save();

        return redirect()->route('social_media_links.index')->with('success', 'Link updated successfully!');
    }

    // Remove the specified social media link from storage.
    public function destroy($id)
    {
        $link = SocialMediaLink::findOrFail($id);
        $link->delete();

        return redirect()->route('social_media_links.index')->with('success', 'Link deleted successfully!');
    }
}
