<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Storedbooks */
/* @var $modela frontend\models\Storedbooks */

$this->title = 'Upravit knihu: ' . $model->name;
?>
<div class="storedbooks-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modela' => $modela,
    ]) ?>

</div>
