<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%prducts}}`.
 */
class m230524_161258_create_prducts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%produtcs}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->comment('Название товара'),
            'image' => $this->string(255)->notNull()->comment('Фото'),,
            'description' => $this->string(1000)->notNull()->comment('Описание'),,
            'deleted' => $this->integer()->notNull('Удален')->defaultValue(null),
        ]);

        for($i = 1; $i <= 5; $i++){
            $this->insert('{{%produtcs}}', 
            [
                'name'=>'Товар '. $i, 
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
                'image'=>'image.png',
        ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%prducts}}');
    }
}
