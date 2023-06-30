<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\DailyCollectionAmountCollection;
use App\Models\DailyCollectionAmount;
use App\Repositories\DailyCollectionAmountRepository;
use Illuminate\Http\Request;

class DailyCollectionAmountController extends Controller
{
    private DailyCollectionAmountRepository $dailyCollectionAmountRepository;

    public function __construct(DailyCollectionAmountRepository $dailyCollectionAmountRepository)
    {
        $this->dailyCollectionAmountRepository = $dailyCollectionAmountRepository;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new DailyCollectionAmountCollection($this->dailyCollectionAmountRepository->getAll());
    }

}
