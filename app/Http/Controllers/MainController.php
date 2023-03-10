<?php

namespace App\Http\Controllers;

use App\Services\Scraping\ScrapeService;

class MainController extends Controller
{
    protected $scrapeService;

    public function __construct(ScrapeService $scrapeService) {
        $this->scrapeService = $scrapeService;
    }

    public function scrape() {
        $this->scrapeService->scrape();
    }

}
