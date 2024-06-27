<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormOption extends Component
{
    public $name;
    public $options;
    public $selected;
    public $attributes;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param array $options
     * @param mixed $selected
     * @param array $attributes
     */
    public function __construct($name, $options = [], $selected = null, $attributes = [])
    {
        $this->name = $name;
        $this->options = $options;
        $this->selected = $selected;
        $this->attributes = $attributes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-option');
    }
}
