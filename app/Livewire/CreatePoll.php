<?php

namespace App\Livewire;

use Livewire\Component;

class CreatePoll extends Component
{

    public $title;
    public $options = ['first'];

    public function render()
    {
        return view('livewire.create-poll');
    }

    public function addOption()
    {
        $this->options[] = '';  //add new value in options array
    }

    public function removeOption($index)
    {
        unset($this->options[$index]);  //remove value from options array
        $this->options = array_values($this->options);  //re-index the array
    }

}
