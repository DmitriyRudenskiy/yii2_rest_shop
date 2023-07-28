<?php


namespace Api;

use \ApiTester;
use Codeception\Util\HttpCode;
use Faker\Factory;

class ProviderCest
{
    private const URL = 'providers';

    public function getAllProviders(ApiTester $apiTester): void
    {
        $apiTester->sendGet(self::URL);
        $apiTester->seeResponseCodeIs(HttpCode::OK);
        $apiTester->seeResponseIsJson();
        $apiTester->seeResponseIsValidOnJsonSchemaString('{"type":"array"}');

        $validResponseJsonSchema = json_encode(
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

    public function getProvider(ApiTester $apiTester): void
    {

        $apiTester->sendGet(self::URL . '/1');
        $apiTester->seeResponseCodeIs(HttpCode::OK);
        $apiTester->seeResponseIsJson();
        $apiTester->seeResponseIsValidOnJsonSchemaString('{"type":"object"}');

        $validResponseJsonSchema = json_encode(
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

    public function createNewProvider(ApiTester $apiTester): void
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

    public function updateProvider(ApiTester $apiTester): void
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

    public function deleteProvider(ApiTester $apiTester): void
    {

        $url = self::URL . '/1';
        $apiTester->sendDelete($url);
        $apiTester->seeResponseCodeIs(HttpCode::NO_CONTENT);


        $apiTester->sendGet($url);
        $apiTester->seeResponseCodeIs(HttpCode::NOT_FOUND);
        $apiTester->seeResponseIsJson();
    }
}
