<?php

namespace App\Repositories;

use App\Interfaces\DailyCollectionAmountRepositoryInterface;
use App\Models\DailyCollectionAmount;

class DailyCollectionAmountRepository implements DailyCollectionAmountRepositoryInterface {
    public function getAll() {
        return DailyCollectionAmount::all();
    }
}
