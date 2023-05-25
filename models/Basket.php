<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "basket".
 *
 * @property int $id
 * @property int $id_products Товар
 * @property int $id_user Пользователь
 */
class Basket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'basket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_products', 'id_user'], 'required'],
            [['id_products', 'id_user'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_products' => 'Id Products',
            'id_user' => 'Id User',
        ];
    }

    public function existsProductsInBasket(){
        return self::findOne(['id_products' => $this->id_products]);
    }
    
    public function addProduct(){
        $b = new self();
        $b->id_products = $this->id_products;
        
    }

    public function products(){
        if($b = $this->existsProductsInBasket())
            $b->delete();
        
        
    }
}
