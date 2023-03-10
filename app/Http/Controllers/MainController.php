<?php

namespace App\Http\Controllers;

use App\Services\DailySum\DailySumService;
use App\Services\Scraping\ScrapeService;

class MainController extends Controller
{
    protected $scrapeService;
    protected $dailySumService;

    public function __construct(ScrapeService $scrapeService, DailySumService $dailySumService) {
        $this->scrapeService = $scrapeService;
        $this->dailySumService = $dailySumService;
    }

    public function scrape() {
        $this->scrapeService->scrape();
    }

    public function dailySum() {
        $this->dailySumService->getDailySum();
    }

}
