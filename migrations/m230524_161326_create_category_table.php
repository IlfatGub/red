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
            'name' => $this->string(1000)->notNull()->comment('Наименование'),
            'deleted' => $this->integer()->null()->defaultValue(null)->comment('Удален'),
        ]);

        echo shell_exec("php yii gii/model --tableName=category --modelClass=Category --interactive=0 --overwrite=1 --ns=app\\models");
        echo shell_exec("php yii gii/crud --modelClass=app\\models\\Category --controllerClass=app\\controllers\CategoryController");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}
