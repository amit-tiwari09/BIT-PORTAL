<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    public function show()
    {
        $user = Auth::guard('student')->user(); // Get the authenticated student

        // Retrieve the student's testimonial, if it exists
        $userTestimonial = Testimonial::where('student_id', $user->id)->first();

        // Pass the testimonial data to the view
        return view('testimonials.show', compact('userTestimonial'));
    }

    public function edit($id)
    {
        // Get the testimonial by ID and check if it belongs to the authenticated user
        $testimonial = Testimonial::findOrFail($id);

        if ($testimonial->student_id != Auth::guard('student')->id()) {
            return redirect()->route('testimonials.show')->with('error', 'You are not authorized to edit this testimonial.');
        }

        // Show the edit form with the testimonial data
        return view('testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|max:500',
        ]);

        $testimonial = Testimonial::findOrFail($id);

        // Check if the testimonial belongs to the authenticated user
        if ($testimonial->student_id != Auth::guard('student')->id()) {
            return redirect()->route('testimonials.show')->with('error', 'You are not authorized to edit this testimonial.');
        }

        // Update the testimonial content
        $testimonial->content = $request->content;
        $testimonial->save();

        return redirect()->route('testimonials.show')->with('success', 'Testimonial updated successfully.');
    }


    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Check if the testimonial belongs to the authenticated user
        if ($testimonial->student_id != Auth::guard('student')->id()) {
            return redirect()->route('testimonials.show')->with('error', 'You are not authorized to delete this testimonial.');
        }

        // Delete the testimonial
        $testimonial->delete();

        return redirect()->route('testimonials.show')->with('success', 'Testimonial deleted successfully.');
    }


    // Store testimonial
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|max:500',
        ]);

        $user = Auth::guard('student')->user();

        // Check if the student already has a testimonial
        if (Testimonial::where('student_id', $user->id)->exists()) {
            return redirect()->route('testimonials.show')->with('error', 'You have already added a testimonial.');
        }

        // Create a new testimonial
        Testimonial::create([
            'student_id' => $user->id,
            'content' => $request->content,
            'name' => $user->name,
            'image' => $user->image, // Assuming the image is stored in the user profile
        ]);

        return redirect()->route('testimonials.show')->with('success', 'Testimonial added successfully.');
    }

    public function create()
    {
        // If the user already has a testimonial, redirect back with a message
        $user = Auth::guard('student')->user();
        if (Testimonial::where('student_id', $user->id)->exists()) {
            return redirect()->route('testimonials.show')->with('error', 'You have already added a testimonial.');
        }

        return view('testimonials.create');
    }
}
