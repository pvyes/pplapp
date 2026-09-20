<!-- Detail Modal -->
<div>
@if($showModal)
    <div 
        wire:keydown.escape.window="closeModal" 
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50"
        >
        <!-- wire:click.outside sluit de modal als je buiten deze witte kaart klikt -->
        <div 
            wire:click.outside="closeModal"
            class="bg-white rounded-lg max-w-2xl w-full max-h-[90vh] overflow-y-auto p-6 relative shadow-xl"
            >          
            @if($selectedItem)
                <div class="item-details space-y-4">
                    
                    <!-- Title and artists -->
                    <div class="title-and-artists">
                        <h2 class="text-2xl font-bold text-gray-900 text-left">
                            {{ $selectedItem['title'] ?? 'Untitled' }}
                        </h2>
                        
                        @if(!empty($selectedItem['artists']))
                            <ul class="list-inside text-sm text-gray-700 mt-1 space-y-1 text-left">
                                @foreach($selectedItem['artists'] as $artist)
                                    <li>
                                        <span class="text-gray-500">
                                            {{ data_get($artist, 'artistfunction.artistfunction', 'Artist:') }}:
                                        </span>
                                        <span class="font-medium">
                                            {{ data_get($artist, 'person.readable_name', $artist['readable_artist'] ?? '') }}
                                        </span>
                                        @if (!$loop->last)
                                            <span class="text-gray-500">, </span>
                                        @endif                                           
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <!-- Description -->
                    @if(!empty($selectedItem['description']))
                        <div class="description text-sm">              
                            <div>
                                <strong class="text-lg font-semibold text-gray-900">Description:</strong>
                                <p class="text-gray-700 mt-1">{{ $selectedItem['description'] }}</p>
                            </div>
                        </div>
                    @endif 

                    <!-- Tags -->
                    @if(!empty($selectedItem['tags']))
                        <div class="tags text-sm">
                            <div>
                                <strong class="text-lg font-semibold text-gray-900">Tags:</strong>
                                <div class="flex flex-wrap gap-1 mt-1">
                                    @foreach($selectedItem['tags'] as $tag)
                                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">
                                            {{ $tag['tagname'] ?? '' }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Media player -->
                    <livewire:mediaplayer :file="$selectedItem['file'][0]" />
 
                    <!-- Date, ID, Reference -->
                    <div class="date-id-reference border-t pt-3">
                        <div class="text-sm text-gray-700 space-y-1 grid grid-cols-3 gap-2">
                            @if(!empty($selectedItem['publishedAt']))
                                <div>
                                    <strong>Published At:</strong>
                                    <span>{{ \Carbon\Carbon::parse($selectedItem['publishedAt'])->format('d-m-Y') }}</span>
                                </div>
                            @endif
                            @if(!empty($selectedItem['id']))
                                <div><strong>ID:</strong> <span>{{ $selectedItem['id'] }}</span></div>
                            @endif
                            @if(!empty($selectedItem['reference']))
                                <div><strong>Reference:</strong> <span>{{ $selectedItem['reference'] }}</span></div>
                            @endif    
                        </div>
                    </div>

                    <!-- Custom Metadata (Info Object) -->
                    @if(!empty($selectedItem['info']) && is_array($selectedItem['info']))
                        <div class="metadata mt-3">
                            <div class="bg-gray-50 p-3 rounded border">
                                <strong class="block mb-1 text-sm">Additional Info:</strong>
                                <div class="text-xs space-y-1">
                                    @foreach($selectedItem['info'] as $key => $val)
                                        <div>
                                            <span class="font-semibold">{{ $key }}</span>: <span>{{ $val }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- File Details -->
                    @if(!empty($selectedItem['file']))
                        <div class="border-t pt-3">
                            <strong>File Information:</strong>
                            <div class="text-sm mt-1 grid grid-cols-2 gap-2">
                                @if($selectedItem['file'][0]['name'])<div><strong>Name: </strong> <span>{{ $selectedItem['file'][0]['name'] }}</span></div>@endif
                                @if($selectedItem['file'][0]['url'])<div><strong>Fileurl: </strong><span>{{ $selectedItem['file'][0]['url'] }}</span></div>@endif
                                @if($selectedItem['file'][0]['mime'])<div><strong>Mime: </strong> <span>{{ $selectedItem['file'][0]['mime'] }}</span></div>@endif
                                @if($selectedItem['file'][0]['width'])<div><strong>Dimensions: </strong> <span>{{ $selectedItem['file'][0]['width'] }} . 'x' . {{ $selectedItem['file']['height'] }}</span></div>@endif
                                @if($selectedItem['file'][0]['size'])<div><strong>Size: </strong> <span>{{ $selectedItem['file'][0]['size'] . 'KB'}}</span></div>@endif
                            </div>
                        </div>
                    @endif

                    <!-- Sluitknop -->
                    <div class="flex items-center justify-end pt-3 border-t">
                        <button 
                            type="button" 
                            wire:click="closeModal" 
                            class="bg-red-500 text-white font-bold px-6 py-2 rounded shadow hover:bg-red-600 transition"
                        >
                            Sluiten
                        </button>
                    </div>

                </div>
            @endif
        </div>
    </div>
@endif
</div>
