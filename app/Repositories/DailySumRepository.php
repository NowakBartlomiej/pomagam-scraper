<?php

namespace App\Repositories;

use App\Interfaces\DailySumRepositoryInterface;
use App\Models\DailySum;

class DailySumRepository implements DailySumRepositoryInterface {
    public function getAll() {
        return DailySum::all();
    }
}
