<?php

declare(strict_types=1);

namespace App\IO\Controller;

use App\API\Foods\Application\CreateFruitsAndVegetablesCollectionsCommand;
use App\API\Foods\Application\CreateFruitsAndVegetablesCollectionsHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class FoodsController extends AbstractController
{

    public function __construct(private readonly CreateFruitsAndVegetablesCollectionsHandler $handler) {}

    public function loadData(Request $request): Response
    {
        $request = json_decode($request->getContent(), true);
        $command = new CreateFruitsAndVegetablesCollectionsCommand($request);
        $this->handler->__invoke($command);
        return new JsonResponse(['message' => 'Data loaded'], Response::HTTP_OK);
    }
}