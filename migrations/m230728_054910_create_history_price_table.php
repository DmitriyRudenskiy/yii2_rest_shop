<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%history_price}}`.
 */
class m230728_054910_create_history_price_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('history_price', [
            'id' => $this->primaryKey(),
            'provider_id' => $this->integer(),
            'product_id' => $this->integer(),
            'type_price_id' => $this->integer(),
            'old_price' => $this->decimal(),
            'created_at' => $this->dateTime()->defaultValue(date('Y-m-d H:i:s')),
        ]);

        $this->createIndex(
            'idx_history_price_provider_id',
            'history_price',
            'product_id'
        );

        $this->addForeignKey(
            'fk_history_price_provider_id',
            'history_price',
            'provider_id',
            'provider',
            'id',
        );

        $this->createIndex(
            'idx_history_price_product_id',
            'history_price',
            'product_id'
        );

        $this->addForeignKey(
            'fk_history_price_product_id',
            'history_price',
            'product_id',
            'product',
            'id',
        );

        $this->createIndex(
            'idx_history_price_type_price_id',
            'history_price',
            'type_price_id'
        );

        $this->addForeignKey(
            'fk_history_price_type_price_id',
            'history_price',
            'type_price_id',
            'type_price',
            'id',
        );
    }

    public function safeDown(): void
    {
        $this->dropForeignKey('fk_history_price_provider_id', 'history_price');
        $this->dropIndex('idx_history_price_provider_id', 'history_price');
        $this->dropForeignKey('fk_history_price_product_id', 'history_price');
        $this->dropIndex('idx_history_price_product_id', 'history_price');
        $this->dropForeignKey('fk_history_price_type_price_id', 'history_price');
        $this->dropIndex('idx_history_price_type_price_id', 'history_price');
        $this->dropTable('history_price');
    }
}
