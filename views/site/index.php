<?php

/** @var yii\web\View $this */

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

            <div class="body-content mt-4 mb-4">
                <hr class="bg-info">
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
                                <button href="#" id="basket" class="btn btn-warning" data-id="<?= $item->id ?>">Корзина</button>
                            </div>
                        </div>
                    <?php }  ?>
                </div>
            </div>
        <?php endif ?>
        </div>
</div>


<script>
    // ------------------------------ Отчет по пользователям -----------------------------------------
const baskets = document.querySelectorAll('#basket');

if (baskets) {
    baskets.forEach(function (basket) {
        basket.addEventListener('click', () => {
            let id_product = basket.getAttribute('data-id');

            console.log(id_product);
            jQuery.ajax({
                type: "GET",
                url: "/products/basket",
                data: 'id=' + id_product,
                success: function (data) {
                    let r = JSON.parse(data);
                        let div = document.createElement('div');
                        div.className = "notify";
                        div.innerHTML = r.message;
                      
                        document.body.append(div);
                        setTimeout(() => div.remove(), 3000);
                    // $(content_block).html(datas;
                    // $('.progress').hide();
        
                    // if (remark_report) remark_report.classList.remove('op03');
                },
            });
        });
    })
}

</script>