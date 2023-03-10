<?php

namespace App\Interfaces;

interface DataRepositoryInterface {
    public function getAll();
    public function getCount();
    public function getTotalAmount();
}
