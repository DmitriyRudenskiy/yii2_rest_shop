<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%type_price}}`.
 */
class m230727_232642_create_type_price_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('type_price', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('type_price');
    }
}
