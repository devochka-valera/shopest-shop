<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrderToProduct */

$this->title = 'Update Order To Product: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order To Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-to-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
