<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Items List</title>
    <!-- Hide elements with x-cloak until Alpine loads -->
    <style>
        [x-cloak] { display: none !important; }
    </style>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8" x-data="{ selectedItem: null }">

    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Items</h1>

        <!-- Item List -->
        <div class="bg-white rounded-lg shadow overflow-hidden divide-y divide-gray-200">
            @foreach($items as $item)
                <!-- Safe encoding to prevent breaking HTML attributes -->
                <div @click="selectedItem = {{ json_encode($item) }}" 
                     class="p-4 hover:bg-gray-50 cursor-pointer transition flex justify-between items-center">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">{{ $item['title'] ?? 'Untitled' }}</h2>
                        <p class="text-sm text-gray-500">
                            <strong>Artists:</strong> 
                            {{ 
                                collect(data_get($item, 'artists', []))
                                    ->pluck('person.readable_name')
                                    ->filter()
                                    ->join(', ') ?: 'N/A' 
                            }}
                        </p>
                    </div>
                    <span class="text-xs bg-blue-100 text-blue-800 font-medium px-2.5 py-0.5 rounded">View Details</span>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Detail Modal -->
    <div x-show="selectedItem !== null" 
         x-cloak 
         class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
        
        <div @click.outside="selectedItem = null" 
             class="bg-white rounded-lg max-w-2xl w-full max-h-[90vh] overflow-y-auto p-6 relative shadow-xl">
            
            <button @click="selectedItem = null" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-xl font-bold">&times;</button>

            <template x-if="selectedItem">
                <div class="space-y-4">
                    <h2 class="text-2xl font-bold text-gray-900" x-text="selectedItem.title"></h2>
                    
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div><strong>Reference:</strong> <span x-text="selectedItem.reference || 'N/A'"></span></div>
                        <template x-if="selectedItem.publishedAt">
                            <div><strong>Published At:</strong> <span x-text="new Date(selectedItem.publishedAt).toLocaleDateString()"></span></div>
                        </template>
                    </div>

                    <div>
                        <strong>Description:</strong>
                        <p class="text-gray-700 mt-1" x-text="selectedItem.description || 'No description available.'"></p>
                    </div>

                    <!-- Custom Metadata (Info Object) -->
                    <template x-if="selectedItem.info && Object.keys(selectedItem.info).length">
                        <div class="bg-gray-50 p-3 rounded border">
                            <strong class="block mb-1 text-sm">Additional Info:</strong>
                            <div class="text-xs space-y-1">
                                <template x-for="(val, key) in selectedItem.info" :key="key">
                                    <div><span class="font-semibold" x-text="key"></span>: <span x-text="val"></span></div>
                                </template>
                            </div>
                        </div>
                    </template>

                    <!-- Artists Section -->
                    <template x-if="selectedItem.artists && selectedItem.artists.length">
                        <div>
                            <strong>Artists:</strong>
                            <ul class="list-disc list-inside text-sm text-gray-700 mt-1 space-y-1">
                                <template x-for="(artist, index) in selectedItem.artists" :key="index">
                                    <li>
                                        <span class="font-medium" x-text="artist.person?.readable_name || artist.readable_artist"></span>
                                        <span class="text-gray-500" x-show="artist.artistfunction?.artistfunction" x-text="'(' + artist.artistfunction?.artistfunction + ')'"></span>
                                        <span class="block text-xs text-gray-500 ml-4" x-show="artist.person?.bio" x-text="artist.person?.bio"></span>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </template>

                    <!-- File Details -->
                    <template x-if="selectedItem.file">
                        <div class="border-t pt-3">
                            <strong>File Information:</strong>
                            <div class="text-sm mt-1 grid grid-cols-2 gap-2">
                                <div><strong>Name:</strong> <span x-text="selectedItem.file.name"></span></div>
                                <div><strong>Mime:</strong> <span x-text="selectedItem.file.mime"></span></div>
                                <div><strong>Dimensions:</strong> <span x-text="selectedItem.file.width + 'x' + selectedItem.file.height"></span></div>
                                <div><strong>Size:</strong> <span x-text="selectedItem.file.size + ' KB'"></span></div>
                            </div>
                            <template x-if="selectedItem.file.url">
                                <a :href="selectedItem.file.url" target="_blank" class="inline-block mt-2 text-xs text-blue-600 underline">View Asset</a>
                            </template>
                        </div>
                    </template>

                    <!-- Tags -->
                    <template x-if="selectedItem.tags && selectedItem.tags.length">
                        <div class="border-t pt-3">
                            <strong>Tags:</strong>
                            <div class="flex flex-wrap gap-1 mt-1">
                                <template x-for="(tag, index) in selectedItem.tags" :key="index">
                                    <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded" x-text="tag.tagname"></span>
                                </template>
                            </div>
                        </div>
                    </template>

                </div>
            </template>
        </div>
    </div>

</body>
</html>