<?php

namespace App\Services\DailySum;

use App\Models\DailySum;
use Illuminate\Support\Carbon;
use App\Repositories\DataRepository;

class DailySumService {
    
    private DataRepository $dataRepository;

    public function __construct(DataRepository $dataRepository) {
        $this->dataRepository = $dataRepository;
    }

    public function getDailySum() {
        DailySum::upsert([
            'sum' => $this->dataRepository->getTotalAmount(),
            'date' => Carbon::now()->format('Y-m-d'),
        ], ['date'], ['sum']);
    }
}
