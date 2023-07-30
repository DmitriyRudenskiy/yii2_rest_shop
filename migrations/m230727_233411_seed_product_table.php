<?php

use yii\db\Migration;

/**
 * Class m230727_233411_seed_product_table
 */
class m230727_233411_seed_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $generator = \Faker\Factory::create();
        for ($i = 0; $i < 50; ++$i) {
            $this->insert(
                'product',
                [
                    'name' => $generator->name,
                    'description' => $generator->paragraph,
                ]
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): bool
    {
        echo "m230727_233411_seed_product_table cannot be reverted.\n";

        return false;
    }
}
