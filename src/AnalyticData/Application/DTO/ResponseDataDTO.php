<?php

namespace App\AnalyticData\Application\DTO;

class ResponseDataDTO
{

    private readonly array $data;

    /**
     * @param ResponseDataItemDTO[] $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getData(): array
    {
        return $this->data;
    }

}