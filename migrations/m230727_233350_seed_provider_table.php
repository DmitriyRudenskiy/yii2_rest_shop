<?php

use yii\db\Migration;

/**
 * Class m230727_233350_seed_provider_table
 */
class m230727_233350_seed_provider_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $generator = \Faker\Factory::create();

        for ($i = 0; $i < 10; ++$i) {
            $this->insert(
                'provider',
                [
                    'name' => $generator->name
                ]
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): bool
    {
        echo "m230727_233350_seed_provider_table cannot be reverted.\n";

        return false;
    }
}
