<?php

/** @var yii\web\View $this */

$type = $_GET['type'] ?? null;

use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <?php if (Yii::$app->user->can('admin')) : ?>
        <div class="mt-5">
            AdminPanel
            <hr>
            <a class="btn btn-outline-secondary" href="<?= Url::toRoute(['/user']) ?>"> Пользователи </a>
            <a class="btn btn-outline-secondary" href="<?= Url::toRoute(['/user']) ?>"> Товары </a>
            <a class="btn btn-outline-secondary" href="<?= Url::toRoute(['/user']) ?>"> Категории </a>
            <a class="btn btn-outline-secondary" href="<?= Url::toRoute(['/user']) ?>"> Комментарии </a>
            <a class="btn btn-outline-secondary" href="<?= Url::toRoute(['/user']) ?>"> Корзина </a>
            <div class="mt-5"> RBAC</span>
                <hr>
                <a class="btn btn-outline-secondary" href="<?= Url::toRoute(['/rbac/assignment']) ?>"> Rbac User </a>
                <a class="btn btn-outline-secondary" href="<?= Url::toRoute(['/rbac/role']) ?>"> Rbac Role</a>
            </div>
        <?php else : ?>
            <?php if ($type) : ?>
                <div class="alert alert-primary" role="alert">
                    Популярные категории
                </div>
                <?php foreach (array_unique(ArrayHelper::map($model, 'id', 'categorys')) as $item) : ?>
                    <?php if($item): ?>
                        <button type="button" class="btn btn-outline-primary"><?= $item ?></button>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="body-content mt-4 mb-4">
                <hr class="bg-info">

                <?php if ($type) : ?>
                    <div class="alert alert-secondary" role="alert">
                        Популярные товары
                    </div>
                <?php endif; ?>
                <div class="row">
                    <?php foreach ($model as $item) { ?>
                        <div class="card col-4 p-3">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title><?= $item->name ?></title>
                                <rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text>
                            </svg>
                            <div class="card-body">
                                <h5 class="card-title"><?= $item->name ?></h5>
                                <p class="card-text"><?= $item->_description ?></p>
                                <a href="<?= Url::toRoute(['/products/view', 'id' => $item->id]) ?>" class="btn btn-primary">Перейти...</a>
                                <button href="#" id="basket-<?= $item->id ?>" class="btn  <?= $item->_basket ? 'btn-success' : 'btn-warning' ?> basket" data-id="<?= $item->id ?>">
                                    <?= $item->_basket ? 'В корзине' : 'Корзина' ?>
                                </button>
                            </div>
                        </div>
                    <?php }  ?>
                </div>
            </div>
        <?php endif ?>
        </div>
</div>


<script>

</script>