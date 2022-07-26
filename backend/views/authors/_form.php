<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Authors */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="authors-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jmeno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prijmeni')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Přidat', ['class' => 'btn btn-success']) ?>

        <?= Html::a('Zpět', ['/authors/index'], ['class'=>'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
