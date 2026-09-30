  <div class="max-w-4xl mx-auto">
    <!-- Playlist List -->
    <div class="bg-white rounded-lg shadow overflow-hidden divide-y divide-gray-200">
        @foreach($playlists as $playlist)
            <div onclick="window.location='{{ route('playlist.show', $playlist->id) }}';" style="cursor: pointer;" 
                    class="playlist-summary p-4 hover:bg-gray-50 cursor-pointer
                    flex w-full items-center gap-4 bg-base-200 p-4 rounded-box ">    
                    <div>
                        <livewire:useravatar :playlist="$playlist"/>
                    </div>
                    <div class="playlist-title">
                        <h2 class="text-lg font-semibold text-gray-800">{{ $playlist['title'] ?? 'Untitled' }}</h2>
                    </div>
                    <div class="playlist-description"> 
                        <p class="text-sm text-gray-500">
                            {{ $playlist['description'] }}
                        </p>
                    </div>
                    <span class="text-xs bg-blue-100 text-blue-800 font-medium px-2.5 py-0.5 rounded p-4">Open</span>
                </div>
        @endforeach
    </div>
    <livewire:item-detail-modal/>
</div>
