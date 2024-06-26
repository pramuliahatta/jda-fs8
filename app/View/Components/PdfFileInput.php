<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PdfFileInput extends Component
{
    public $pdfUrl;

    /**
     * Create a new component instance.
     *
     * @param string|null $pdfUrl
     * @return void
     */
    public function __construct($pdfUrl = null)
    {
        $this->pdfUrl = $pdfUrl;
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
