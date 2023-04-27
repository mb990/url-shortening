<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrUpdateUrlRequest;
use App\Models\Url;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\UrlService;

class UrlController extends Controller
{
    private UrlService $urlService;

    public function __construct(UrlService $urlService)
    {
        $this->urlService = $urlService;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrUpdateUrlRequest $request): JsonResponse
    {
        $requestData = $request->only('original');
        $this->urlService->store($requestData);

        return response()->json(['success' => 'Success: url shortened']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Url $url): JsonResponse
    {
        return response()->json(compact('url'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreOrUpdateUrlRequest $request, Url $url): JsonResponse
    {
        $requestData = $request->all();
        $this->urlService->update($url, $requestData);

        return response()->json(['url' => $url->fresh(), 'success' => 'Url updated']);
    }
}
