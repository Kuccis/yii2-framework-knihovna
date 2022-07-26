<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Authors;

/* @var $this yii\web\View */
/* @var $model frontend\models\Storedbooks */

$this->title = $model->name;
\yii\web\YiiAsset::register($this);
?>
<div class="storedbooks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Upravit knihu', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Odstranit knihu', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Opravdu chcete odstranit tuto knihu?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="row">
        <div class="col-lg-3">
            <?php
            $author = Authors::find()
            ->where(['id' => $model->authorid])
            ->one();
            ?>
            <?php echo Html::img('/../knihovnakucera/images/books/'.$model->img, [
            'alt' => 'Nahledovy obrazek knihy',
            'width' => '250px',
            'height' => '350px',

            ]);?>
        </div>
        <div class="col-lg-9">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'name',
                    'genre',
                    [
                        'label' => 'Stav zapůjčení',
                        'value' => ($model->borrowed == 0) ? "Volné" : "Vypůjčené",
                    ],
                    [
                        'label' => 'Počet zapůjčení',
                        'value' => $model->borrowedcount."x",
                    ],
                    [
                        'label' => 'Autor',
                        'value' => $author->jmeno." ".$author->prijmeni,
                    ],
                ],

            ]) ?>

            <?= Html::a('Zpět', ['index'], ['class'=>'btn btn-secondary']) ?>
        </div>
    </div>

</div>
