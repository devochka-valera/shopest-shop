<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OrderToProduct */

$this->title = 'Create Order To Product';
$this->params['breadcrumbs'][] = ['label' => 'Order To Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-to-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
