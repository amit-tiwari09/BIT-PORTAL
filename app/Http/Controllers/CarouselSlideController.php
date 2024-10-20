<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarouselSlide; // Adjust this if your model is in App instead of App\Models


use Illuminate\Support\Facades\File; // To handle file deletion

class CarouselSlideController extends Controller
{
    // Display all carousel slides
    public function index()
    {
        $slides = CarouselSlide::all();
        return view('carousel.index', compact('slides'));
    }

    // Show form for creating a new slide
    public function create()
    {
        return view('carousel.create');
    }

    // Store new slide
    public function store(Request $request)
    {
        $this->validate($request, [
            'main_text' => 'required|string|max:255',
            'secondary_text' => 'nullable|string|max:255',
            'image' => 'required',
        ]);

        $slideData = $request->only(['main_text', 'secondary_text']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->file('image')->move(public_path('carousel_images'), $imageName);
            $slideData['image'] = $imageName;
        }

        CarouselSlide::create($slideData);

        return redirect()->route('carousel.index')->with('success', 'Slide added successfully.');
    }

    // Show form for editing a slide
    public function edit($id)
    {
        $carouselSlide = CarouselSlide::findOrFail($id);
        return view('carousel.edit', compact('carouselSlide'));
    }

    // Update a slide
    public function update(Request $request, $id)
    {

        
        $carouselSlide = CarouselSlide::findOrFail($id);

        $this->validate($request, [
            'main_text' => 'required|string|max:255',
            'secondary_text' => 'nullable|string|max:255',
            'image' => 'required',
        ]);

        $slideData = $request->only(['main_text', 'secondary_text']);

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($carouselSlide->image && File::exists(public_path('carousel_images/' . $carouselSlide->image))) {
                File::delete(public_path('carousel_images/' . $carouselSlide->image));
            }

            // Upload new image
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->file('image')->move(public_path('carousel_images'), $imageName);
            $slideData['image'] = $imageName;
        }

        $carouselSlide->update($slideData);

        return redirect()->route('carousel.index')->with('success', 'Slide updated successfully.');
    }

    // Delete a slide
    public function destroy($id)
    {
        $carouselSlide = CarouselSlide::findOrFail($id);

        // Delete the image file if it exists
        if ($carouselSlide->image && File::exists(public_path('carousel_images/' . $carouselSlide->image))) {
            File::delete(public_path('carousel_images/' . $carouselSlide->image));
        }

        $carouselSlide->delete();

        return redirect()->route('carousel.index')->with('success', 'Slide deleted successfully.');
    }
}
