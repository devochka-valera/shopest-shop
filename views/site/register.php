<?php
use yii\bootstrap\ActiveForm;

?>
<div class='container'>
    <h1> Register </h1>
    <?php
    $form = ActiveForm::begin(['class' => 'form-horizontal']);
    ?>
    <?= $form->field($model, 'firstName')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'lastName')->textInput() ?>
    <?= $form->field($model, 'address')->textarea() ?>
    <?= $form->field($model, 'email')->textInput() ?>
    <?= $form->field($model, 'password')->passwordInput() ?>

    <div>
        <button type="submit" class="btn btn-primary"> Submit</button>

    </div>

    <?php
    ActiveForm::end();
    ?>
</div>
