<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int $id_products Товар
 * @property int $id_user Пользователь
 * @property int $date Товар
 * @property string $comment Комментарий
 * @property int|null $deleted Удален
 */
class Comments extends ModelInterface 
{

    public $_user;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_products', 'comment'], 'required'],
            [['id_products', 'date', 'deleted', 'id_user'], 'integer'],
            [['comment', 'user'], 'string', 'max' => 1000],
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
            'id_user' => 'id_user',
            'comment' => 'Comment',
            'deleted' => 'Deleted',
        ];
    }

    public function getUser()
	{
		return $this->hasOne(User::className(), ['id' => 'id_user']);
	}

    public function afterFind()
    {
        $this->date = date('Y-m-d H:i:s', $this->date);
        $this->_user = $this->user->username;
    }

    public function existsCommentsByProduct(){
        return self::find()
            ->where(['id_products' => $this->id_products])
            ->andWhere(['is', 'deleted', new \yii\db\Expression('null')])
            ->exists();
    }

    public function getCommentsByProduct(){
        if($this->existsCommentsByProduct())
            return self::find()
                ->where(['id_products' => $this->id_products])
                ->andWhere(['is', 'deleted', new \yii\db\Expression('null')])
                ->all();
    }
}
