<?php

namespace App\Shared\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HealthCheckController extends AbstractController
{

    #[Route('/healthcheck', name: 'healthcheck')]
    public function check(): Response
    {
        return $this->json('check');
    }
}