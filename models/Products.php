<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name Название товара
 * @property string $image Фото
 * @property string $description Описание
 * @property int|null $deleted
 */
class Products extends ModelInterface
{
    public $_description;
    public $_basket;
    public $_category;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image', 'description'], 'required'],
            [['deleted'], 'integer'],
            [['_basket'], 'boolean'],
            [['name', 'image'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'image' => 'Image',
            'description' => 'Description',
            'deleted' => 'Deleted',
        ];
    }

    public function getBasket()
	{
		return $this->hasOne(Basket::className(), ['id_products' => 'id']);
	}
    public function getComments()
	{
		return $this->hasOne(Comments::className(), ['id_products' => 'id']);
	}
    public function getCategory()
	{
		return $this->hasOne(Category::className(), ['id_products' => 'id']);
	}


    public function getCategorys(){
        return $this->category->name;
    }

    public function afterFind()
    {
        $this->_description = substr($this->description, 0, 60).'...';
        $this->_basket = $this->basket ? true : false;
    }
}
