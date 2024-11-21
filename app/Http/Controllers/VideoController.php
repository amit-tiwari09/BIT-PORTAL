<?php

namespace App\Http\Controllers;

use App\Video;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index()
    {
        // Fetch all videos from the database
        $videos = Video::all();

        // Return the view with the list of videos
        return view('videos.index', compact('videos'));
    }


    public function create()
    {
        // Return the view for the video upload form
        return view('videos.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'nullable|string',
            'video' => 'required|mimes:mp4,mov,avi', // Video file validation
            'author' => 'required|string|max:255', // Author name is required
            'thumbnail' => 'nullable|max:2048', // Thumbnail validation
        ]);

        // Move the uploaded video to the public/pictures directory
        $file = $request->file('video');
        $filePath = 'pictures/' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('pictures'), $filePath);

        // Check if a thumbnail is uploaded and valid
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailFilename = uniqid() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('pictures'), $thumbnailFilename);
            $thumbnailPath = 'pictures/' . $thumbnailFilename;
        }

        // Store the video information in the database
        Video::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'file_path' => $filePath,
            'thumbnail' => $thumbnailPath,
            'author' => $request->author,
        ]);

        return redirect()->route('videos.index')->with('success', 'Video uploaded successfully!');
    }


    public function edit($id)
    {
        $video = Video::findOrFail($id);

        // Check if the authenticated user is a staff
        if (Auth::guard('staff')->check()) {
            $uploaderName = Auth::guard('staff')->user()->name;
        }
        // Check if the authenticated user is a student
        else if (Auth::guard('student')->check()) {
            $uploaderName = Auth::guard('student')->user()->name;
        } else {
            return redirect()->route('videos.index')->with('error', 'You must be logged in to edit videos.');
        }

        // Check if the uploader's name matches the author of the video
        if ($video->author !== $uploaderName) {
            return redirect()->route('videos.index')->with('error', 'You are not authorized to edit this video.');
        }

        return view('videos.edit', compact('video'));
    }


    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'nullable|string',
            'author' => 'required|string|max:255',
            'thumbnail' => 'nullable|max:2048', // Thumbnail validation
            'video' => 'nullable', // Video file validation
        ]);

        $video = Video::findOrFail($id); // Find the video by ID

        // Handle the uploaded video file
        if ($request->hasFile('video')) {
            // Remove the old video file from the public directory
            if (file_exists(public_path($video->file_path))) {
                unlink(public_path($video->file_path));
            }

            // Move the new video to the public/pictures directory
            $file = $request->file('video');
            $filePath = 'pictures/' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('pictures'), $filePath);
        } else {
            $filePath = $video->file_path; // Keep the existing file if no new file is uploaded
        }

        // Handle the uploaded thumbnail image
        if ($request->hasFile('thumbnail')) {
            // Remove the old thumbnail if a new one is uploaded
            if (file_exists(public_path($video->thumbnail))) {
                unlink(public_path($video->thumbnail));
            }

            // Move the new thumbnail to the public/pictures directory
            $thumbnail = $request->file('thumbnail');
            $thumbnailFilename = uniqid() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('pictures'), $thumbnailFilename);
            $thumbnailPath = 'pictures/' . $thumbnailFilename;
        } else {
            $thumbnailPath = $video->thumbnail; // Keep the existing thumbnail if no new thumbnail is uploaded
        }

        // Update the video details in the database
        $video->update([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'author' => $request->author,
            'file_path' => $filePath,
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect()->route('videos.index')->with('success', 'Video updated successfully!');
    }


    public function destroy($id)
    {
        $video = Video::findOrFail($id); // Find the video by ID

        // Check if the authenticated user is a staff or student and verify they are the uploader
        if (Auth::guard('staff')->check()) {
            $uploaderName = Auth::guard('staff')->user()->name;
        } elseif (Auth::guard('student')->check()) {
            $uploaderName = Auth::guard('student')->user()->name;
        } else {
            return redirect()->route('videos.index')->with('error', 'You must be logged in to delete a video.');
        }

        // Check if the authenticated user is the same as the author of the video
        if ($video->author !== $uploaderName) {
            return redirect()->route('videos.index')->with('error', 'You are not authorized to delete this video.');
        }

        // Delete the video and thumbnail files from the public folder
        if (file_exists(public_path($video->file_path))) {
            unlink(public_path($video->file_path)); // Delete the video file
        }

        if (file_exists(public_path($video->thumbnail))) {
            unlink(public_path($video->thumbnail)); // Delete the thumbnail file
        }

        // Delete the video record from the database
        $video->delete();

        return redirect()->route('videos.index')->with('success', 'Video deleted successfully!');
    }


    // In your VideoController
    public function show($id)
    {
        $video = Video::findOrFail($id);
        $otherVideos = Video::where('id', '!=', $id)->get(); // Get other videos
        return view('videos.show', compact('video', 'otherVideos'));
    }

    public function search(Request $request)
{
    $query = $request->get('search'); // Get the search query

    if ($query) {
        // Search for videos by title, description, or author name
        $videos = Video::where('title', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->orWhere('author', 'LIKE', "%{$query}%")
            ->paginate(12); // Paginate results
    } else {
        // If no query, fetch all videos
        $videos = Video::paginate(12);
    }

    return view('videos.index', compact('videos', 'query'));
}

}
