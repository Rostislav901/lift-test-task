<?php

namespace App\Shared\Application\ArgumentResolver;

use App\Shared\Application\Attribute\RequestParameter;
use App\Shared\Application\Exception\RequestBodyConvertException;
use App\Shared\Application\Exception\ValidationException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class RequestParamsArgumentResolver extends AbstractRequestDataArgumentResolver
{
    public function resolve(Request $request, ArgumentMetadata $argument): iterable
    {
        if (!$argument->getAttributesOfType(RequestParameter::class, ArgumentMetadata::IS_INSTANCEOF)) {
            return [];
        }

        try {
            $model = $this->serializer->deserialize(
                json_encode($request->attributes->all()['_route_params']),
                $argument->getType(),
                JsonEncoder::FORMAT,
            );
        } catch (\Throwable $throwable) {
            echo $throwable->getMessage();
            throw new RequestBodyConvertException($throwable);
        }

        $errors = $this->validator->validate($model);
        if (count($errors) > 0) {
            throw new ValidationException($errors);
        }

        return [$model];
    }
}