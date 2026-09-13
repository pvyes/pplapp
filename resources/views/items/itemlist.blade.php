<x-layout>
    <x-slot:title>
        Items
    </x-slot:title>
<div class="p-8" x-data="{ selectedItem: null }">
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
    
    <!-- Include modal partial inside the x-data wrapper -->
    @include('items.item')
    
</div>
</x-layout>