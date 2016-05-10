<?php

use app\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qty')->textInput() ?>

    <?php
    $categories = Category::find()->all();
    $items = ArrayHelper::map($categories, 'id', 'name');
    $params = [
        'prompt' => 'Укажите родительскую категорию'
    ];
    ?>
    <?= $form->field($model, 'categoryId')->dropDownList($items, $params) ?>

    <div class="form-group">
        <?php if (!$model->isNewRecord) {
            echo Html::a('Add photo', ['admin/product-image/create', 'productId' => $model->id], ['class' => 'btn btn-success']);
        }
        ?>
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
