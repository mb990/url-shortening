<?php

namespace App\Services;

use App\Models\Url;
use Illuminate\Support\Str;

class UrlService
{
    public function show(Url $url): Url|null
    {
        return Url::findOrFail($url->id);
    }

    /**
     * Store new Url
     */
    public function store(array $requestData): Url
    {
        $url = $requestData['original'];
        $inputData = [
            'original'  => $url,
            'short'     => $this->shorten()
        ];

        return Url::create($inputData);
    }

    /**
     * Update Url
     */
    public function update(Url $url, array $requestData): void
    {
        if (array_key_exists('total_visits', $requestData)) {
            $requestData['total_visits'] = ++$url->total_visits;
        }
        $url->update($requestData);
    }

    /**
     * Shorten raw url value
     */
    public function shorten(): string
    {
        do {
            $shortenedUrl = strtolower(Str::random(Url::SHORT_URL_LENGTH));
        } while(Url::where('short', $shortenedUrl)->first());

        return $shortenedUrl;
    }
}
