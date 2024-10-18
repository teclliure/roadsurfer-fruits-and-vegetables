<?php

declare(strict_types=1);

namespace App\IO\Controller;

use App\API\Foods\Application\GetFruitsHandler;
use App\API\Foods\Application\GetFruitsQuery;
use App\API\Foods\Application\GetVegetablesHandler;
use App\API\Foods\Application\GetVegetablesQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class VegetablesController extends AbstractController
{

    public function __construct(private readonly GetVegetablesHandler $handler) {}

    public function getVegetables(Request $request): Response
    {
        $unit = $request->query->get('unit', 'g');
        $vegetables = $this->handler->__invoke(new GetVegetablesQuery());
        $response = array_map(function ($fruit) use ($unit) {
            return $fruit->toArray($unit);
        }, $vegetables->items());

        return new JsonResponse($response, Response::HTTP_OK);
    }
}