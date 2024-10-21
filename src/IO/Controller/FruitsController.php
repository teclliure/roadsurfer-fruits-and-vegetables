<?php

declare(strict_types=1);

namespace App\IO\Controller;

use App\API\Foods\Application\CreateFruitCommand;
use App\API\Foods\Application\CreateFruitHandler;
use App\API\Foods\Application\GetFruitsHandler;
use App\API\Foods\Application\GetFruitsQuery;
use App\API\Foods\Domain\Fruit;
use App\API\Foods\Domain\MassConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class FruitsController extends AbstractController
{
    public function __construct(
        private readonly GetFruitsHandler $getFruitsHandler,
        private readonly CreateFruitHandler $createFruitHandler,
        private readonly MassConverter $massConverter,
    ) {}

    public function getFruits(Request $request): Response
    {
        $unit = $request->query->get('unit', 'g');
        $fruits = $this->getFruitsHandler->__invoke(new GetFruitsQuery());
        $response = array_map(function (Fruit $fruit) use ($unit) {
            return $fruit->toArray($unit);
        }, $fruits->items());

        return new JsonResponse($response, Response::HTTP_OK);
    }

    public function postFruits(Request $request): Response
    {
        try {
            $content = $request->toArray();
            if ('kg' === $content['unit']) {
                $content['quantity'] = $this->massConverter->kilogramsToGrams($content['quantity']);
            }
            $command = new CreateFruitCommand(
                $content['id'],
                $content['name'],
                $content['quantity'],
            );
            $this->createFruitHandler->__invoke($command);

            return new JsonResponse('', Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return new JsonResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }
}
