<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrUpdateUrlRequest;
use App\Models\Url;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\UrlService;
use Illuminate\Http\Response;

class UrlController extends Controller
{
    private UrlService $urlService;

    public function __construct(UrlService $urlService)
    {
        $this->urlService = $urlService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function destroy(Url $url)
    {
        //
    }
}
