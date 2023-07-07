<?php

namespace App\Services\DailyCollectionAmount;

use Illuminate\Support\Carbon;
use App\Models\DailyCollectionAmount;
use App\Repositories\DailySumRepository;
use App\Repositories\DailyCollectionAmountRepository;

class DailyCollectionAmountService {
    
    private DailySumRepository $dailySumRepository;

    public function __construct(DailySumRepository $dailySumRepository)
    {
        $this->dailySumRepository = $dailySumRepository;
    }

    public function getDailyCollectionAmount() {
        $difference = $this->dailySumRepository->getSecondSum() - $this->dailySumRepository->getFirstSum();

        DailyCollectionAmount::upsert([
            'daily_collection_amount' => $difference,
            'date' => Carbon::now()->format('Y-m-d'),
        ], ['date'], ['daily_collection_amount']);
    }
}
