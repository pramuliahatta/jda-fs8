<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextareaEditor extends Component
{
    public $id;
    public $label;
    public $name;
    public $value;
    /**
     * Create a new component instance.
     */
    public function __construct($id, $label, $name, $value)
    {
        $this->id = $id;
        $this->label = $label;
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.textarea-editor');
    }
}
