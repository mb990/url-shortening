<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    /**
     * Show homepage
     */
    public function index(): View
    {
        return view('index');
    }

    /**
     * Show single Url page
     */
    public function show(Url $url): View
    {
        return view('details', compact('url'));
    }
}
