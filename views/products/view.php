<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\Products $model */
/** @var app\models\Comments $comment */
/** @var app\models\Comments $comments_product */

\yii\web\YiiAsset::register($this);
Pjax::begin();
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row  py-3" style="background: #DAE8EC">
        <div class="col-3">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title><?= $model->name ?></title>
                <rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text>
            </svg>
        </div>
        <div class="col-9">
            <?= $model->name ?>
            <hr>
            <?= $model->description ?>
        </div>
    </div>
    <hr>

    <?php if ($comments_product) : ?>
        <table class="table table-bordered">
            <?php foreach ($comments_product as $item) : ?>
                <tr>
                    <td> <b><?= $item->_user ?>. </b> <?= $item->comment ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <?php $form = ActiveForm::begin(
        [
            'action' => Url::toRoute(['view', 'id' => $_GET['id']]),
            'options' => []
        ]
    ); ?>

    <div class="row pt-3 mt-2" style="background: #DAE8EC">
        <div class="col-11">
            <?= $form->field($comment, 'comment')->textInput(['maxlength' => true])->label(false) ?>
            <?= $form->field($comment, 'files[]')->fileInput(['multiple' => true])->label(false) ?>
        </div>
        <div class="col-1">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
</div>

<?php Pjax::end(); ?>