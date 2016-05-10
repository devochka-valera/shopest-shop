<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductImage */

$this->title = 'Create Product Image';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product->name , 'url' => ['admin/product/view', 'id' => $model->productId]];
$this->params['breadcrumbs'][] = $this->title;



?>
<div class="product-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
