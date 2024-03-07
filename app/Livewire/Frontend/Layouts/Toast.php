<?php

namespace App\Livewire\Frontend\Layouts;

use Livewire\Component;

class Toast extends Component
{
    public $showToaster;
    public $type;
    public $title;
    public $message;

    public function mount() {
        $this->showToaster = false;
    }

    protected $listeners = [
        'showToaster' => 'showToaster'
    ];

    public function showToaster($type, $title, $message) {
        $this->showToaster = true;
        $this->type = $type;
        $this->title = $title;
        $this->message = $message;
    }

    public function render()
    {
        return view('frontend.layouts.toast');
    }
}
