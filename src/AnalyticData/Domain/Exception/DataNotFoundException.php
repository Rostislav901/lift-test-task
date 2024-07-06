<?php

namespace App\AnalyticData\Domain\Exception;

class DataNotFoundException extends \RuntimeException
{

    public function __construct()
    {
        parent::__construct("Data not found");
    }
}