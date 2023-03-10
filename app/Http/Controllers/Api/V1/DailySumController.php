<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\DailySumCollection;
use App\Models\DailySum;
use Illuminate\Http\Request;

class DailySumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new DailySumCollection(DailySum::paginate());
    }

    
}
