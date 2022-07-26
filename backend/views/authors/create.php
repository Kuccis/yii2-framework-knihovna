<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Authors */

$this->title = 'Přidat autora do systému';
?>
<div class="authors-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
