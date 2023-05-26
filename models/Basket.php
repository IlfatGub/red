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
class Basket extends ModelInterface
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

    
    public function getProducts()
	{
		return $this->hasOne(Products::className(), ['id' => 'id_products']);
	}

    // проверка на наличие в корхине у пользователя
    public function existsProductsInBasket(){
        return self::findOne(['id_products' => $this->id_products, 'id_user' => Yii::$app->user->id]);
    }
    
    // добавляем в корзину
    public function addProduct(){
        $b = new self();
        $b->id_products = $this->id_products;
        $b->id_user = Yii::$app->user->id;
        if($b->getSave()){
            return json_encode(['status' => true, 'method' => 'add' ]);
        }else{
            return json_encode(['status' => false]);
        }
    }

    // проверка на наличие товара в корзине если нет то добавляем, если есть то удаляем
    public function products(){
        if($b = $this->existsProductsInBasket()){
            $b->delete();
            return  json_encode(['status' => true, 'method' => 'delete' ]);
        }

        echo $this->addProduct();
    }
}
