<template x-teleport="body">
    <!-- Detail Modal -->
        <div x-show="selectedItem !== null" 
            x-cloak 
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
            <div @click.outside="selectedItem = null" 
                class="bg-white rounded-lg max-w-2xl w-full max-h-[90vh] overflow-y-auto p-6 relative shadow-xl">
                
                <button @click="selectedItem = null" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-xl font-bold">&times;</button>

                <template x-if="selectedItem">
                    <div class="item-details space-y-4">
                        <div class="title-and-artists">
                            <h2 class="text-2xl font-bold text-gray-900 text-left" x-text="selectedItem.title"></h2>
                            <ul class="list-inside text-sm text-gray-700 mt-1 space-y-1 text-left">
                            <template x-for="(artist, index) in selectedItem.artists" :key="index">
                                <li>
                                    <span class="text-gray-500" x-text="artist.artistfunction?.artistfunction + ':' || 'nothing'"></span>
                                    <span class="font-medium" x-text="artist.person?.readable_name || artist.readable_artist"></span>
                                    <!--span class="block text-xs text-gray-500 ml-4" x-show="artist.person?.bio" x-text="artist.person?.bio"></span-->
                                    <template x-if="index < selectedItem.artists.length - 1">
                                        <span class="text-gray-500">, </span>
                                    </template>
                                </li>
                            </template>
                            </ul>
                        </div>
                        <div class="description text-sm">              
                            <template x-if="selectedItem.description && selectedItem.description.length">
                                <div>
                                    <strong class="text-lg font-semibold text-gray-900">Description:</strong>
                                    <p class="text-gray-700 mt-1" x-text="selectedItem.description || 'No description available.'"></p>
                                </div>
                            </template> 
                        </div>
                        <div class="border-t pt-3">
                        <div class="text-sm text-gray-700 space-y-1">
                            <div><strong>ID:</strong> <span x-text="selectedItem.id"></span></div>
                            <div><strong>Reference:</strong> <span x-text="selectedItem.reference || 'N/A'"></span></div>
                            <template x-if="selectedItem.publishedAt">
                                <div><strong>Published At:</strong> <span x-text="new Date(selectedItem.publishedAt).toLocaleDateString()"></span></div>
                            </template>
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
        </template>