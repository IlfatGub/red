<?php

use app\models\Basket;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\Basket $model */

?>
<div class="basket-index">

<?php if($model ): ?>
    <div class="body-content mt-4 mb-4">
        <hr class="bg-info">
        <div class="row">
            <?php foreach ($model as $item) { ?>
                <div class="card col-4 p-3">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title><?= $item->products->name ?></title>
                        <rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text>
                    </svg>
                    <div class="card-body">
                        <h5 class="card-title"><?= $item->products->name ?></h5>
                        <p class="card-text"><?= $item->products->_description ?></p>
                        <a href="<?= Url::toRoute(['/products/view', 'id' => $item->products->id]) ?>" class="btn btn-primary">Перейти...</a>
                        <button href="#" id="basket-<?= $item->products->id ?>" class="btn btn-danger basket" data-action='basket' data-id="<?= $item->products->id ?>">
                            Удалить
                        </button>
                    </div>
                </div>
            <?php }  ?>
        </div>
    </div>
<?php else: ?>
    Корзина пуста
<?php endif; ?>

</div>