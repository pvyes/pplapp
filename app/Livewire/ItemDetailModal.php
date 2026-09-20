<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; // Belangrijk voor het luisteren naar events
use App\Models\Item;

class ItemDetailModal extends Component
{
    public $selectedItem = null;
    public $showModal = false;

    // Luister naar het event dat vanuit de lijst wordt afgevuurd
    #[On('open-item-modal')]
    public function loadItem($selected)
    {
        $this->selectedItem = $selected; //json_encoded
        $this->showModal = true;
    }

    public function closeModal()
    {   
        $this->selectedItem = null;
        $this->showModal = false;   
    }

    public function render()
    {
        return view('livewire.itemDetailModal');
    }
}
