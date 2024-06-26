<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PdfFileInput extends Component
{
    public $documentUrl;

    /**
     * Create a new component instance.
     *
     * @param string|null $documentUrl
     * @return void
     */
    public function __construct($documentUrl = null)
    {
        $this->documentUrl = $documentUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.pdf-file-input');
    }
}
