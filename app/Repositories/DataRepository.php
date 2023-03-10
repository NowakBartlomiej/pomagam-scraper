<?php

namespace App\Repositories;

use App\Interfaces\DataRepositoryInterface;
use App\Models\Data;

class DataRepository implements DataRepositoryInterface {
    public function getAll() {
        return Data::all();
    }
    
    public function getCount() {
        return Data::count();
    }
    
    public function getTotalAmount() {
        return Data::sum('amount');
    }
}
