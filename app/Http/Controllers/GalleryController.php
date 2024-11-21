<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Gallery;
use App\Category;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('category')->orderBy('created_at', 'desc')->get();
        $categories = Category::all();

        // Pass both galleries and categories to the view
        return view('gallery.index', compact('galleries', 'categories'));
    }

    public function index3()
    {
        $galleries = Gallery::with('category')->orderBy('created_at', 'desc')->get();
        $categories = Category::all();

        // Pass both galleries and categories to the view
        return view('gallery.index3', compact('galleries', 'categories'));
    }

    public function index2()
    {
        $galleries = Gallery::with('category')->orderBy('created_at', 'desc')->get();
        $categories = Category::all();

        // Pass both galleries and categories to the view
        return view('gallery.index2', compact('galleries', 'categories'));
    }


    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        $uploaderName = Auth::guard('staff')->user()->name;
       

        



        if ($gallery->uploader_name !== $uploaderName) {
            return redirect()->route('gallery.index')->with('error', 'You are not authorized to edit this image.');
        }

        $categories = Category::all();
        return view('gallery.edit', compact('gallery', 'categories'));
    }



    public function create()
    {
        $categories = Category::all();
        return view('gallery.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'images.*' => 'required|mimes:jpeg,png,jpg,gif', // Note the change here for multiple files
            'description' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id'
        ]);

        $uploaderName = Auth::guard('staff')->check() ? Auth::guard('staff')->user()->name : 'Guest';
        // Loop through each uploaded image
        foreach ($request->file('images') as $file) {
            $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension(); // Generate a unique filename
            $file->move(public_path('uploads'), $filename); // Move the file to the specified directory

            // Create a new gallery entry for each image
            Gallery::create([
                'image_path' => 'uploads/' . $filename,
                'description' => $request->description, // Use the same description
                'category_id' => $request->category_id,
                'uploader_name' => $uploaderName,
            ]);
        }

        return redirect()->route('gallery.index')->with('success', 'Images uploaded successfully');
    }




    public function update(Request $request, $id)
    {
        // Find the existing gallery entry
        $gallery = Gallery::findOrFail($id);
        $uploaderName = Auth::guard('staff')->user()->name;

        if ($gallery->uploader_name !== $uploaderName) {
            return redirect()->route('gallery.index')->with('error', 'You are not authorized to update this image.');
        }

        // Validate the incoming request
        $request->validate([
            'image' => 'nullable|mimes:jpeg,png,jpg,gif', // Image is optional
            'description' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id'
        ]);

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if necessary
            if (file_exists(public_path($gallery->image_path))) {
                unlink(public_path($gallery->image_path));
            }

            // Store the new image
            $filename = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('uploads'), $filename);

            // Update the image path in the gallery
            $gallery->image_path = 'uploads/' . $filename;
        }

        // Update the other fields
        $gallery->description = $request->description;
        $gallery->category_id = $request->category_id;

        // Save the updated gallery entry
        $gallery->save();

        return redirect()->route('gallery.index')->with('success', 'Image updated successfully');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $uploaderName = Auth::guard('staff')->user()->name;


        if ($gallery->uploader_name !== $uploaderName) {
            return redirect()->route('gallery.index')->with('error', 'You are not authorized to delete this image.');
        }

        // Optionally delete the image file from storage
        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Image deleted successfully');
    }

    public function myMedia()
    {
        // Get the authenticated user's name
        $userName = auth()->guard('staff')->user()->name;

        // Fetch images uploaded by the user
        $categories = Category::all(); // Assuming you need categories for the filter
        $galleries = Gallery::where('uploader_name', $userName)->with('category')->get();

        return view('gallery.index', compact('categories', 'galleries'));
    }
}
