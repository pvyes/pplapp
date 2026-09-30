<x-layout>
    <x-slot:title>
        Items
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
      <h1 class="text-3xl font-bold mt-8">Items</h1>
      <livewire:itemlist :items="$items" />
    </div>

</x-layout>