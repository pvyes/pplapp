<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return view('playlists', [
        'playlists' => Playlist::all()
      ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('playlists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
      // Validate the request
      $validated = $this->validatePlaylist($request);
      auth()->user()->playlists()->create($validated);

      // Create the chirp (no user for now - we'll add auth later)
      /*
      \App\Models\Playlist::create([
          'title' => $validated['title'],
          'description' => $validated['description'],
          'visibility' => $validated['visibility'],
          'user_id' => auth()->id(),
      ]);
      */

      // Redirect back to the feed
      return redirect('/playlist')->with('success', 'Playlist created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Playlist $playlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    #[Authorize('edit', 'post')]
    public function edit(Playlist $playlist)
    {
      return view('playlists.edit', compact('playlist'));
    }

    /**
     * Update the specified resource in storage.
     */
    #[Authorize('update', 'post')]
    public function update(Request $request, Playlist $playlist)
    {
      $validated = $this->validatePlaylist($request, $playlist);
      $playlist->update($validated);
      return redirect('/playlist')->with('success', 'Playlist updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    #[Authorize('delete', 'post')]
    public function destroy(Playlist $playlist)
    {
      $playlist->delete();
      return redirect('/')->with('success', 'Playlist deleted!');
    }

    private function validatePlaylist(Request $request, Playlist $playlist = null)
    {
        $rules = [
            'title' => 'required|string|max:255|unique:playlists,title',
            'description' => 'nullable|string|max:255',
            'visibility' => 'required|in:public,restricted,private',
        ];

        if ($playlist) {
            // If updating, ignore the current playlist's title for uniqueness
            $rules['title'] .= ',' . $playlist->id;
        }

        return $request->validate($rules);
    }
}
