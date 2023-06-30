<?php

namespace App\Http\Controllers;

use App\Services\DailyCollectionAmount\DailyCollectionAmountService;
use App\Services\DailySum\DailySumService;
use App\Services\Scraping\ScrapeService;

class MainController extends Controller
{
    protected $scrapeService;
    protected $dailySumService;
    protected $dailyCollectionAmountService;

    public function __construct(
        ScrapeService $scrapeService, 
        DailySumService $dailySumService,
        DailyCollectionAmountService $dailyCollectionAmountService) {
        $this->scrapeService = $scrapeService;
        $this->dailySumService = $dailySumService;
        $this->dailyCollectionAmountService = $dailyCollectionAmountService;
    }

    public function scrape() {
        $this->scrapeService->scrape();
    }

    public function dailySum() {
        $this->dailySumService->getDailySum();
    }

    public function dailyCollectionAmount() {
        $this->dailyCollectionAmountService->getDailyCollectionAmount();
    }

}
