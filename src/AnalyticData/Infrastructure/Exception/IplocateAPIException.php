<?php

namespace App\AnalyticData\Infrastructure\Exception;

class IplocateAPIException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct("IplocateAPIException");
    }
}