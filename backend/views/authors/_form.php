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

    <?php
    if($model->img == "default.png")
        {
            echo $form->field($model, 'img')->fileInput();
        }
        else{
            echo Html::a('Odstranit fotografii', ['odstranitfoto', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Opravdu chcete odstranit fotografii?',
                    'method' => 'post',
                ],
            ]);
        }
    ?>
    <div class="form-group" style="margin-top:20px;">
        <?= Html::submitButton('Přidat', ['class' => 'btn btn-success']) ?>

        <?= Html::a('Zpět', ['/authors/index'], ['class'=>'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
