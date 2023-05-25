<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\models;

use app\components\NotifyWidget;
use app\models\ShowError;
use kartik\select2\Select2;
use Yii;

abstract class ModelInterface extends  \yii\db\ActiveRecord
{

    //Вывод ошибки при сохранени
    public function getSave()
    {
        if ($this->save()) {
            return true;
        } else {
            $error = '';
            foreach ($this->errors as $key => $value) {
                $error .= $key . ': ' . $value[0];
            }
            echo '<pre>'; print_r($error); echo '</pre>'; die();
        }
        return false;
    }

    public function setVisible()
    {
        $this->deleted = isset($this->deleted) ? null : 1;
        $this->getSave('Запись удалена');
    }
}