<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Carbon\Carbon;

class Article extends Component
{
    public $detail;
    public $formattedDate;
    public $leadParagraphHtml;
    public $restOfContent;
    /**
     * Create a new component instance.
     */
    public function __construct($detail)
    {
        $this->detail = $detail;

        $dom = new \DOMDocument();
        @$dom->loadHTML($detail['body']);

        $paragraphs = $dom->getElementsByTagName('p');

        if ($paragraphs->length > 0) {
            $leadParagraph = $paragraphs->item(0);
            if ($leadParagraph instanceof \DOMElement) {
                $leadParagraph->setAttribute('class', 'lead text-gray-700');
                $this->leadParagraphHtml = $dom->saveHTML($leadParagraph);
                $leadParagraph->parentNode->removeChild($leadParagraph);
            }
        }

        $this->restOfContent = '';
        foreach ($dom->getElementsByTagName('body')->item(0)->childNodes as $child) {
            $this->restOfContent .= $dom->saveHTML($child);
        }

        // Set Carbon locale to Indonesian
        Carbon::setLocale('id');

        // Ensure $displayDate is a Carbon instance
        $displayDate = $detail['updated_at'];
        if (!($displayDate instanceof Carbon)) {
            $displayDate = Carbon::parse($displayDate);
        }

        // Format date to "27 Juni 2024"
        $this->formattedDate = $displayDate->translatedFormat('d F Y');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.article');
    }
}
