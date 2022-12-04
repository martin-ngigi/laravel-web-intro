<?php

namespace App\View\Components;

use Illuminate\View\Component;

class header extends Component
{
    /**
     * Summary of title
     * @var mixed
     * * Create a new component instance.
     * data is passed from myComponent.blade.php
     */
    public $title;
    public function __construct($data)
    {
        //
        $this->title = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header');
    }
}
