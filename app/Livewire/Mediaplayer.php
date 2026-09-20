<?php

namespace App\Livewire;

use Livewire\Component;

class Mediaplayer extends Component
{
    public $file;

    public function render()
    {
        return view('livewire.mediaplayer');
    }
}
