<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImageUploaderViewer extends Component
{
    public $name;
    public $id;
    public $imagePath;
    public $altText;
    /**
     * Create a new component instance.
     */

    public function __construct($name, $id, $imagePath = '', $altText = 'Selected Image')
    {
        $this->name = $name;
        $this->id = $id;
        $this->imagePath = $imagePath;
        $this->altText = $altText;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.image-uploader-viewer');
    }
}
