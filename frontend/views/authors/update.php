<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Authors */

$this->title = 'Upravit autora: ' . $model->jmeno." ".$model->prijmeni;
?>
<div class="authors-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
