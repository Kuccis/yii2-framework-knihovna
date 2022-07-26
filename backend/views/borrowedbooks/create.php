<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Borrowedbooks */

$this->title = 'Create Borrowedbooks';
?>
<div class="borrowedbooks-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
