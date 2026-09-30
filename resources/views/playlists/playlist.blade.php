<!--Titel ok //avatar ok // beschrijving ok
// overzicht items met afspeelmogelijkheid
// knoppen update / delete  (indien toegelaten) / terug naar lijst
-->

<x-layout>
  <x-slot:title>
      Playlist
  </x-slot:title>

  <div class="max-w-2xl mx-auto">
    <div class="playlist-avatar-title p-4 flex w-full items-center gap-4 bg-base-200 rounded-box ">
      <div>
        <livewire:useravatar :playlist="$playlist"/>
      </div>
      <div class="playlist-title">
        <h1 class="text-3xl font-bold">{{ $playlist['title'] ?? 'Untitled' }}</h1>
      </div>
      <div class="buttons ml-auto">
        @can('update', $playlist)
          <div class="inline-block px-2 align-bottom">
            <a href="/playlists/{{ $playlist->id }}/edit">
              <svg class="w-6 h-6 text-green-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
              </svg>
            </a>
          </div>
        @endcan
        @can('delete', $playlist)
          <form class="inline-block px-2" method="POST" action="/playlists/{{ $playlist->id }}">
              @csrf
              @method('DELETE')
              <button type="submit"
                  onclick="return confirm('Are you sure you want to delete this playlist?')"
                  class="btn btn-ghost btn-xs text-error">
                  <svg class="w-6 h-6 text-red-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                  </svg>
              </button>
          </form>
        @endcan
      </div> 
    </div>
    <div class="playlist-description px-4 w-full"> 
      <p class="text-sm text-gray-500">
        {{ $playlist['description'] }}
      </p>
    </div>
    <div class="space-y-4 mt-8">
      @if(/*count($playlist.playlistItems()) > 0*/ false)
          <livewire:playlistlist :playlists="$playlists" />
      @else
        <div class="hero py-12">
          <div class="hero-content text-center">
              <div>
                <svg class="mx-auto h-12 w-12 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                </svg>
                <p class="mt-4 text-base-content/60">No items yet.</p>
              </div>
          </div>
        </div>
      @endif
      <div class="mt-8">
        <a href="/playlist" class="btn btn-primary">All playlists</a>
      </div>
  </div>
</x-layout>