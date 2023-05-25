<?php

use Faker\Factory;
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
            'date' => $this->integer()->notNull()->comment('Дата'),
            'id_user' => $this->integer()->notNull()->comment('Пользователь'),
            'image' => $this->string(1000)->null()->comment('Изображения'),
            'deleted' => $this->integer()->null()->defaultValue(null)->comment('Удален'),
        ]);


        $faker = Factory::create('ru_RU');
        
        for ($i = 1; $i <= 100; $i++) {
            $this->insert(
                '{{%comments}}',
                [
                    'id_products' => rand(1, 25),
                    'comment' => $faker->text,
                    'date' => strtotime('now'),
                    'id_user' => rand(2,4),
                ]
            );
        }

        // echo shell_exec("php yii gii/model --tableName=comments --modelClass=Comments --interactive=0 --overwrite=1 --ns=app\\models");
        // echo shell_exec("php yii gii/crud --modelClass=app\\models\\Comments --controllerClass=app\\controllers\CommentsController");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comments}}');
    }
}
