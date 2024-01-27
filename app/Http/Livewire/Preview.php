<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Preview extends Component
{

    public $hello = "Hi";
    public $image;

    public function render()
    {
        return view('livewire.preview');
    }
    
}
