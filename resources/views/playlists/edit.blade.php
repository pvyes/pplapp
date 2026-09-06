<x-layout>
  <x-slot:title>
    Edit Playlist
  </x-slot:title>

  <div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold mt-8">Edit Playlist</h1>
    <div class="card bg-base-100 shadow mt-8">
      <div class="card-body">
        <form method="POST" action="/playlists/{{ $playlist->id }}">
          @csrf
          @method('PUT')

          <div class="form-control w-full">
            <label for="title" class="label">
              <span class="label-text">Playlist Title</span>
            </label>
            <input
              name="title"
              placeholder="Playlist Title"
              class="input input-bordered w-full resize-none"
              rows="1"
              maxlength="255"
              required
              value="{{ old('title', $playlist->title) }}"
            ></input>
            @error('title')
              <div class="label">
                <span class="label-text-alt text-error">{{ $message }}</span>
              </div>
            @enderror
          </div>
          <div class="form-control w-full">
            <label for="description" class="label">
              <span class="label-text">Playlist Description</span>
            </label>
            <input  
              name="description"
              placeholder="Playlist Description"
              class="input input-bordered w-full resize-none"
              rows="3"
              maxlength="255"
              value="{{ old('description', $playlist->description) }}"
            ></input>
            @error('description')
              <div class="label">
                <span class="label-text-alt text-error">{{ $message }}</span>
              </div>
            @enderror
          </div>
          <div class="form-control w-full">
            <label for="visibility" class="label">
              <span class="label-text">Playlist Visibility</span>
            </label>
            <select
              name="visibility"
              class="select select-bordered w-full"
              required
              value="{{ old('visibility', $playlist->visibility) }}"
            >
              <option value="private">Private</option>
              <option value="restricted">Restricted</option>
              <option value="public">Public</option>
            </select>
            @error('visibility')
              <div class="label">
                <span class="label-text-alt text-error">{{ $message }}</span>
              </div>
            @enderror
          </div>  
          <div class="card-actions justify-between mt-4">
            <a href="/" class="btn btn-ghost btn-sm">
                Cancel
            </a>
            <button type="submit" class="btn btn-primary btn-sm">
                Update Playlist
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layout>