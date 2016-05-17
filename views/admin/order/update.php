<?php

use app\models\OrderStatus;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = 'Update Order: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $orderStatuses = OrderStatus::find()->all();
    $items = ArrayHelper::map($orderStatuses, 'id', 'name');
    ?>

    <?= $form->field($model, 'statusId')->dropDownList($items) ?>

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
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
