<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = 'Order #'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user.firstName',
            'user.lastName',
            'user.address',
            'status.name',
            'creationDate',
            'modifiedDate',
        ],
    ]) ?>
    <?= /** @var ActiveDataProvider $dataProvider */
    GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "\n{pager}\n{items}",
        'columns' => [
            'product.name',
            'qty',
            'product.price',
        ],
    ]); ?>

</div>
