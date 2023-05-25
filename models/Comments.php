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
 * @property string $image Товар
 * @property string $comment Комментарий
 * @property int|null $deleted Удален
 */
class Comments extends ModelInterface 
{

    public $_user;
    public $cnt;
    public $imageFiles;
    public $files;

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
            [['files'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 2,  'skipOnEmpty' => false, ],
            [['id_products', 'date', 'deleted', 'id_user'], 'integer'],
            [['comment', '_user'], 'string', 'max' => 1000],
            [['imageFiles'], 'safe'],
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


    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
                $file->saveAs($file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
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
