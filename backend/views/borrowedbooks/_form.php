<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Borrowedbooks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="borrowedbooks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idbook')->textInput() ?>

    <?= $form->field($model, 'iduser')->textInput() ?>

    <?= $form->field($model, 'fromdate')->textInput() ?>

    <?= $form->field($model, 'untildate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
