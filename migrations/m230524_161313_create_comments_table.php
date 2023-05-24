<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comments}}`.
 */
class m230524_161313_create_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comments}}', [
            'id' => $this->primaryKey(),
            'id_products' => $this->integer()->notNull()->comment('Товар'),
            'comment' => $this->string(1000)->notNull()->comment('Комментарий'),
            'deleted' => $this->integer()->null()->defaultValue(null)->comment('Удален'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comments}}');
    }
}
