<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog; // Use the lowercase model name
use Illuminate\Support\Facades\Storage; // For file handling
use Illuminate\Support\Str; // For generating a unique filename

class BlogController extends Controller
{
    // Method to display all blog posts
    public function index()
    {
        $posts = blog::all();
        return view('blog.index', compact('posts'));
    }

    public function index2(){
        $posts = blog::all();
        return view('blog.index2', compact('posts'));
    }

    // Method to show the create post form
    public function create()
    {
        $categories = blog::distinct()->pluck('category'); // Get existing categories
        return view('blog.create', compact('categories'));
    }

    // Method to store a new blog post
    public function store(Request $request)
    {


        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category' => 'required_without:newCategory|string|max:255', // Require category or newCategory
            'newCategory' => 'nullable|string|max:255', // New category validation
            'image' => 'required', // Add validation for the image
            'Author' => 'required',
        ]);

        // Determine the category to use
        $category = $request->newCategory ?? $request->category;

        // Handle the image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Generate a unique filename
            $imageName = Str::slug($request->title) . '-' . time() . '.' . $image->getClientOriginalExtension();
            // Move the image to the pictures folder
            $image->move(public_path('pictures'), $imageName);
            $imagePath = 'pictures/' . $imageName; // Store the image path
        }

        // Create a new blog post
        $blog = new blog(); // Use the lowercase model name
        $blog->title = $request->title;
        $blog->body = $request->body; // Store the body content
        $blog->category = $category; // Store the category
        $blog->image_path = $imagePath; // Store the image path
        $blog->Author = $request->Author;
        $blog->save(); // Save the blog post

        return redirect()->route('blog.index')->with('success', 'Post created successfully!');
    }




    public function edit($id)
    {
        $post = blog::findOrFail($id);
        $categories = blog::distinct()->pluck('category');
        return view('blog.edit', compact('categories', 'post'));
    }

    public function show($id)
    {
        // Find the blog post by ID or fail with a 404 error
        $blog = Blog::findOrFail($id);

        // Return the view with the blog post data
        return view('blog.show', compact('blog'));
    }


    public function destroy($id)
    {
        $post = blog::findOrFail($id);
        $post->delete();

        return redirect()->route('blog.index')->with('success', 'Post deleted successfully');
    }



    public function update(Request $request, $id)
    {
        // Find the existing blog post
        $blog = Blog::findOrFail($id); // Retrieve the blog post or fail with a 404 error

        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category' => 'required_without:newCategory|string|max:255', // Require category or newCategory
            'newCategory' => 'nullable|string|max:255', // New category validation
            // Add validation for the image
            'author' => 'required'
        ]);

        // Determine the category to use
        $category = $request->newCategory ?? $request->category;

        // Handle the image upload if provided
        $imagePath = $blog->image_path; // Keep the old image path if no new image is uploaded
        if ($request->hasFile('image')) {
            // If a new image is uploaded, handle the upload process
            $image = $request->file('image');
            // Generate a unique filename
            $imageName = Str::slug($request->title) . '-' . time() . '.' . $image->getClientOriginalExtension();
            // Move the image to the pictures folder
            $image->move(public_path('pictures'), $imageName);
            $imagePath = 'pictures/' . $imageName; // Store the new image path
        }

        // Update the blog post properties
        $blog->title = $request->title;
        $blog->body = $request->body; // Update the body content
        $blog->category = $category; // Update the category
        $blog->image_path = $imagePath; // Update the image path
        $blog->author = $request->author; // Update the author
        $blog->save(); // Save the updated blog post

        // Redirect with a success message
        return redirect()->route('blog.index')->with('success', 'Post updated successfully!');
    }
}
