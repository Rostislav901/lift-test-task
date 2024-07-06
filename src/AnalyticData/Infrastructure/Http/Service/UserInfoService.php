<?php

namespace App\AnalyticData\Infrastructure\Http\Service;

use App\AnalyticData\Application\DTO\UserInfoDTO;
use App\AnalyticData\Infrastructure\Exception\IplocateAPIException;
use App\Shared\Application\Exception\RequestBodyConvertException;
use App\Shared\Application\Exception\ValidationException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class UserInfoService
{
    public function __construct(
        private readonly RequestStack $requestStack,
        private readonly HttpClientInterface $httpClient,
        private readonly SerializerInterface $serializer,
        private readonly ValidatorInterface $validator)
    {
    }


    /**
     * @throws TransportExceptionInterface
     */
    public function userInfo(): UserInfoDTO
    {
        $request = $this->requestStack->getCurrentRequest();
        $ip = $request->getClientIp();
        $response = $this->httpClient->request(
             'GET',
              $_ENV['API_URL'] . $ip
         );

        if ($response->getStatusCode() !== 200){
            throw new IplocateAPIException();
        }
        try {
            $model = $this->serializer->deserialize(
                $response->getContent(),
                UserInfoDTO::class,
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

        return $model;
    }


}