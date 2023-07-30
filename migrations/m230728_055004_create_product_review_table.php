<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_review}}`.
 */
class m230728_055004_create_product_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('product_review', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'author_id' => $this->integer(),
            'value' => $this->integer(),
            'created_at' => $this->dateTime()->defaultValue(date('Y-m-d H:i:s')),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%product_review}}');
    }
}
