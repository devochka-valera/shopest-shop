<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "\n{pager}\n{items}",

        'columns' => [
            'id',
            'user.firstName',
            'user.address',
            'status.name',
            'creationDate',
            'modifiedDate',

            ['class' => 'yii\grid\ActionColumn',
                'header'=>'Действия',
                'template' => '{update}'
            ],
        ],
    ]); ?>
</div>
