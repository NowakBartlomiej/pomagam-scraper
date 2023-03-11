<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\DailySumCollection;
use App\Models\DailySum;
use App\Repositories\DailySumRepository;
use Illuminate\Http\Request;

class DailySumController extends Controller
{
    private DailySumRepository $dailySumRepository;

    public function __construct(DailySumRepository $dailySumRepository) {
        $this->dailySumRepository = $dailySumRepository;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new DailySumCollection($this->dailySumRepository->getAll());
    }

    
}
