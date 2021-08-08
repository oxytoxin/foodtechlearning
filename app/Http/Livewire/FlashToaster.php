<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FlashToaster extends Component
{
    protected $listeners = ['flashtoast'];

    public function render()
    {
        return view('livewire.flash-toaster');
    }

    public function flashtoast($message)
    {
        $this->alert('success', $message,[
            'toast' => false,
            'position' => 'center'
        ]);
    }
}
