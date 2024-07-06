<?php

namespace App\AnalyticData\Application\Transformer;

use App\AnalyticData\Application\DTO\ResponseDataItemDTO;
use App\AnalyticData\Domain\Aggregate\Data\Entity\Data;

class DataTransformer
{

    /**
     * @param Data[] $entities
     * @return  ResponseDataItemDTO[]
     */
    public function fromEntityListToItemDTOList(array $entities): array
    {
        $res = [];

        foreach ($entities as $entity) {
            $res[] = $this->fromEntityToItemDTO($entity);
        }

        return $res;
    }


    public function fromEntityToItemDTO(Data $entityData): ResponseDataItemDTO
    {
        return new ResponseDataItemDTO(
            firstName: $entityData->getFirstName(),
            lastName: $entityData->getLastName(),
            phoneNumbers: [
               $entityData->getPhoneNumber()->value(),
               $entityData->getPhoneNumber2()->value()
            ]
        );
    }

}