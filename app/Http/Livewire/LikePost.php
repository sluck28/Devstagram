<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $mensaje='Hola mundo desde livewire';

    public function render()
    {
        return view('livewire.like-post');
    }



}
