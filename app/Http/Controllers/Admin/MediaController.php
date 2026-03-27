<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        $media = Media::orderBy('created_at', 'desc')->get();

        return view('admin.media.index', compact('media'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240',
        ]);

        $path = $request->file('file')->store('uploads', 'public');

        $file = $request->file('file');

        Media::create([
            'filename'   => $file->getClientOriginalName(),
            'path'       => $path,
            'mime_type'  => $file->getMimeType(),
            'size'       => $file->getSize(),
            'disk'       => 'public',
        ]);

        return redirect()->route('admin.media.index')
            ->with('success', 'File uploaded successfully.');
    }

    public function destroy(Media $medium)
    {
        Storage::disk($medium->disk ?? 'public')->delete($medium->path);

        $medium->delete();

        return redirect()->route('admin.media.index')
            ->with('success', 'File deleted successfully.');
    }
}
