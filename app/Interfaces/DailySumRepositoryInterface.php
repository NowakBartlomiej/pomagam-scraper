<?php

namespace App\Interfaces;

interface DailySumRepositoryInterface {
    public function getAll();
    public function getFirstSum();
    public function getSecondSum();
}
