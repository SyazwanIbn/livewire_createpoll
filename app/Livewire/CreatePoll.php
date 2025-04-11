<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Poll;
use App\Models\Option;

class CreatePoll extends Component
{

    public $title;
    public $options = [];

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

    public function createPoll()
    {
        Poll::create([
            'title' => $this->title   //create poll with title
        ])->options()->createMany( //create options for poll
            collect($this->options)
            ->map(fn($option)=>['name'=>$option]) //
            ->all()
        );

        // foreach($this->options as $optionName)
        // {
        //     $poll->options()->create([
        //         'name' => $optionName  //create options for poll
        //     ]);
        // }

        $this->reset(['title', 'options']);  //reset the form fields
    }

}
