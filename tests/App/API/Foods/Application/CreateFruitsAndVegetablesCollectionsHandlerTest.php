<?php

declare(strict_types=1);

namespace App\Tests\App\API\Foods\Application;

use App\API\Foods\Application\CreateFruitsAndVegetablesCollectionsCommand;
use App\API\Foods\Application\CreateFruitsAndVegetablesCollectionsHandler;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CreateFruitsAndVegetablesCollectionsHandlerTest extends KernelTestCase
{
    private CreateFruitsAndVegetablesCollectionsHandler $createFruitsAndVegetablesCollectionsHandler;

    public function setUp(): void
    {
        parent::setUp();
        $container = static::getContainer();
        $this->createFruitsAndVegetablesCollectionsHandler = $container->get(
            CreateFruitsAndVegetablesCollectionsHandler::class
        );
    }

    public function testCreateCollections(): void
    {
        $request = file_get_contents('request.json');
        $command = new CreateFruitsAndVegetablesCollectionsCommand(json_decode($request, true));
        $this->assertNotEmpty($command->fruitsAndVegetables());

        $this->createFruitsAndVegetablesCollectionsHandler->__invoke($command);
    }
}
