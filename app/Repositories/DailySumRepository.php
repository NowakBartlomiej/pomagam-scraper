<?php

namespace App\Repositories;

use App\Interfaces\DailySumRepositoryInterface;
use App\Models\DailySum;

class DailySumRepository implements DailySumRepositoryInterface {
    public function getAll() {
        return DailySum::orderBy('date', 'DESC')->get();
    }

    public function getFirstSum() {
        return DailySum::orderBy('date', 'DESC')->first()->sum;
    }

    public function getSecondSum() {
        return DailySum::orderBy('date', 'DESC')->skip(1)->first()->sum;
    }

    public function getChartData() {
        return DailySum::orderBy('date', 'ASC')->get();
    }
}
