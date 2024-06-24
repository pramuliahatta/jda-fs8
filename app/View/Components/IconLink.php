<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class IconLink extends Component
{
    public $route;
    public $text;
    /**
     * Create a new component instance.
     */
    public function __construct($route, $text)
    {
        $this->route = $route;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.icon-link');
    }
}
