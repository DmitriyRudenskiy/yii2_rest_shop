
### Create
return [
        'class' => 'yii\\db\\Connection',
        'dsn' => 'mysql:host=db;dbname=yii2_shop',
        'username' => 'root'
        'password' => '123',
        'charset' => 'utf8',
    ];

php yii migrate/create create_provider_table
php yii migrate/create create_type_price_table
php yii migrate/create create_product_table
php yii migrate/create create_history_price_table
php yii migrate/create create_product_rating_table
php yii migrate/create create_product_review_table

php yii migrate/create seed_provider_table
php yii migrate/create seed_type_price_table
php yii migrate/create seed_product_table

php yii gii/model --tableName=provider --modelClass=Provider
php yii gii/model --tableName=type_price --modelClass=TypePrice
php yii gii/model --tableName=product --modelClass=Product

php yii gii/controller --controllerClass=app\\controllers\\ProviderController --baseClass=yii\\rest\\ActiveController
php yii gii/controller --controllerClass=app\\controllers\\ProductController --baseClass=yii\\rest\\ActiveController

php yii serve 0.0.0.0 --port=8083

### Test
./vendor/bin/codecept generate:suite api
composer req --dev codeception/module-rest
mv  tests/Api.suite.yml   tests/api.suite.yml
./vendor/bin/codecept generate:cest api Provider
./vendor/bin/codecept generate:cest api Product

### CI

hstory_price
- id
- product_id
- old_retail_price
- old_wholesale_price


- id
- product_id
- user_id
- rate

product_comment
- id
- product_id
- user_id
- body
