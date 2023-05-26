<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m230524_161326_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'id_products' => $this->integer()->notNull()->comment('Продукт'),
            'name' => $this->string(1000)->notNull()->comment('Наименование'),
            'deleted' => $this->integer()->null()->defaultValue(null)->comment('Удален'),
        ]);



        $category = ['sport', 'category', 'foot', 'number', 'time', 'text', 'string', 'name', 'id', 'result'];
        // echo shell_exec("php yii gii/model --tableName=category --modelClass=Category --interactive=0 --overwrite=1 --ns=app\\models");
        // echo shell_exec("php yii gii/crud --modelClass=app\\models\\Category --controllerClass=app\\controllers\CategoryController");

        for ($i = 1; $i <= 100; $i++) {
            $this->insert(
                '{{%category}}',
                [
                    'id_products' => rand(1, 25),
                    'name' => $category[rand(0, count($category))],
                ]
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}
