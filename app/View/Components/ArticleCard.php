<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Carbon\Carbon;

class ArticleCard extends Component
{
    public $article;
    /**
     * Create a new component instance.
     */

    public function __construct($article)
    {
        $this->article = $article;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $dom = new \DOMDocument();
        @$dom->loadHTML($this->article['body']);

        // Extract text content without tags
        $textContent = strip_tags($dom->saveHTML($dom->documentElement));

        $createdDate = $this->article['created_at'];
        $updatedDate = $this->article['updated_at'];

        $displayDate = $updatedDate ?: $createdDate;

        // Set Carbon locale to Indonesian
        Carbon::setLocale('id');

        // Ensure $displayDate is a Carbon instance
        if (!($displayDate instanceof Carbon)) {
            $displayDate = Carbon::parse($displayDate);
        }

        // Format date to "27 Juni 2024"
        $formattedDate = $displayDate->translatedFormat('d F Y');

        return view('components.article-card', [
            'article' => $this->article,
            'textContent' => $textContent,
            'formattedDate' => $formattedDate,
        ]);
    }
}
