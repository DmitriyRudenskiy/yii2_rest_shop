<?php

use yii\db\Migration;

/**
 * Class m230727_233401_seed_type_price_table
 */
class m230727_233401_seed_type_price_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->insert('type_price', ['id' => 2, 'name' => 'розничная']);
        $this->insert('type_price', ['id' => 3, 'name' => 'оптовая']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): bool
    {
        echo "m230727_233401_seed_type_price_table cannot be reverted.\n";

        return false;
    }
}
