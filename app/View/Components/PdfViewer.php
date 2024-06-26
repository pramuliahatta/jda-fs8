<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PdfViewer extends Component
{
    public $pdfUrl;

    /**
     * Create a new component instance.
     *
     * @param string $pdfUrl
     * @return void
     */
    public function __construct($pdfUrl)
    {
        $this->pdfUrl = $pdfUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.pdf-viewer');
    }
}
