<?php

use Faker\Factory;
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
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->comment('Название товара'),
            'image' => $this->string(255)->notNull()->comment('Фото'),
            'description' => $this->string(1000)->notNull()->comment('Описание'),
            'deleted' => $this->integer()->notNull('Удален')->defaultValue(null),
        ]);

        $faker = Factory::create('ru_RU');
        
        for ($i = 1; $i <= 25; $i++) {
            $this->insert(
                '{{%products}}',
                [
                    'name' => $faker->text(20),
                    'description' => $faker->text,
                    'image' => 'image.png',
                ]
            );
        }

        // echo shell_exec("php yii gii/model --tableName=products --modelClass=Products --interactive=0 --overwrite=1 --ns=app\\models");
        // echo shell_exec("php yii gii/crud --modelClass=app\\models\\Products --controllerClass=app\\controllers\ProductsController");
    
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%prducts}}');
    }
}
