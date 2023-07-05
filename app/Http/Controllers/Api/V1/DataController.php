<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Data;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\DataRepository;
use App\Http\Resources\V1\DataResource;
use App\Http\Resources\V1\DataCollection;

class DataController extends Controller
{
    private DataRepository $dataRepository;

    public function __construct(DataRepository $dataRepository) {
        $this->dataRepository = $dataRepository;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new DataCollection(Data::get());
    }

    public function getCount() {
        return response()->json([
            'count' => $this->dataRepository->getCount(),
        ]);
    }

    public function getTotalAmount() {
        return response()->json([
            'totalAmount' => $this->dataRepository->getTotalAmount(),
        ]);
    }
}
