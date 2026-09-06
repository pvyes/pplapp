<x-layout>
  <x-slot:title>
    Playlist Form
  </x-slot:title>
  <div class="card bg-base-100 shadow mt-8">
    <div class="card-body">
      <form method="POST" action="/playlist">
        @csrf
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
            value="{{ old('title') }}"
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
            value="{{ old('description') }}"
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
            value="{{ old('visibility'), 'default' }}"
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
        <div class="mt-4 flex items-center justify-end">
          <button type="submit" class="btn btn-primary btn-sm">
            Create Playlist
          </button>
        </div>
      </form>
    </div>
  </div>
</x-layout>