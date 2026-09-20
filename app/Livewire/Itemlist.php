<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Item;

class Itemlist extends Component
{
    public $selectedItem = null;
    public $items;

    public function setSelectedItem($item) {
        $this->selectedItm = $item;
        if ($item) {
            $this->dispatch('itemSelected', $item);
        }
    }

    public function render()
    {
        return view('livewire.itemlist');
    }
}
