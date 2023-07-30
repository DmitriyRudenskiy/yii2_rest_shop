<?php

namespace Tests\Api;

use Tests\Support\ApiTester;
use Codeception\Util\HttpCode;
use Faker\Factory;

class ProductCest
{
    private const URL = 'products';

    public function getAllProducts(ApiTester $apiTester): void
    {
        $apiTester->sendGet(self::URL);
        $apiTester->seeResponseCodeIs(HttpCode::OK);
        $apiTester->seeResponseIsJson();
        $apiTester->seeResponseIsValidOnJsonSchemaString('{"type":"array"}');

        $validResponseJsonSchema = (string)json_encode(
            [
                'properties' => [
                    'id'         => ['type' => 'integer'],
                    'name'       => ['type' => 'string'],
                    'started_on' => ['type' => 'string']
                ]
            ]
        );
        $apiTester->seeResponseIsValidOnJsonSchemaString($validResponseJsonSchema);
    }

    public function getProduct(ApiTester $apiTester): void
    {

        $apiTester->sendGet(self::URL . '/1');
        $apiTester->seeResponseCodeIs(HttpCode::OK);
        $apiTester->seeResponseIsJson();
        $apiTester->seeResponseIsValidOnJsonSchemaString('{"type":"object"}');

        $validResponseJsonSchema = (string)json_encode(
            [
                'properties' => [
                    'id'         => ['type' => 'integer'],
                    'name'       => ['type' => 'string'],
                    'started_on' => ['type' => 'string']
                ]
            ]
        );
        $apiTester->seeResponseIsValidOnJsonSchemaString($validResponseJsonSchema);
    }

    public function createNewProduct(ApiTester $apiTester): void
    {

        $generator = Factory::create();
        $apiTester->sendPost(
            self::URL,
            [
                'name'       => $generator->name,
            ]
        );
        $apiTester->seeResponseCodeIs(HttpCode::CREATED);
        $apiTester->seeResponseIsJson();
        $apiTester->seeResponseMatchesJsonType(
            [
                'id'         => 'integer',
                'name'       => 'string',
            ]
        );
    }

    public function updateProduct(ApiTester $apiTester): void
    {

        $generator = Factory::create();
        $newName = $generator->name;
        $apiTester->sendPatch(
            self::URL . '/1',
            [
                'name' => $newName
            ]
        );
        $apiTester->seeResponseCodeIs(HttpCode::OK);
        $apiTester->seeResponseIsJson();
        $apiTester->seeResponseContainsJson(['name' => $newName]);
    }

    public function deleteProduct(ApiTester $apiTester): void
    {

        $url = self::URL . '/1';
        $apiTester->sendDelete($url);
        $apiTester->seeResponseCodeIs(HttpCode::NO_CONTENT);


        $apiTester->sendGet($url);
        $apiTester->seeResponseCodeIs(HttpCode::NOT_FOUND);
        $apiTester->seeResponseIsJson();
    }
}
