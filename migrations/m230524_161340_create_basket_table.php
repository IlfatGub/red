<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%basket}}`.
 */
class m230524_161340_create_basket_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%basket}}', [
            'id' => $this->primaryKey(),
            'id_products' => $this->integer()->notNull()->comment('Товар'),
            'id_user' => $this->integer()->notNull()->comment('Пользователь'),
        ]);

        // echo shell_exec("php yii gii/model --tableName=basket --modelClass=Basket --interactive=0 --overwrite=1 --ns=app\\models");
        // echo shell_exec("php yii gii/crud --modelClass=app\\models\\Basket --controllerClass=app\\controllers\BasketController");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%basket}}');
    }
}
