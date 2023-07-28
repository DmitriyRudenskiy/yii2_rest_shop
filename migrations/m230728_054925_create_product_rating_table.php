<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_rating}}`.
 */
class m230728_054925_create_product_rating_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_rating', [
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
    public function safeDown()
    {
        $this->dropTable('product_rating');
    }
}
