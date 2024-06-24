<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FileInputField extends Component
{
    public $label;
    public $name;
    public $id;
    public $placeholder;
    /**
     * Create a new component instance.
     */

    public function __construct($label, $name, $id, $placeholder = '')
    {
        $this->label = $label;
        $this->name = $name;
        $this->id = $id;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.file-input-field');
    }
}
