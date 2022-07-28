<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;
use frontend\models\Authors;
use frontend\models\Storedbooks;

/* @var $this yii\web\View */
/* @var $model frontend\models\Borrowedbooks */
/* @var $img frontend\models\Storedbooks */
/* @var $user frontend\models\Authors */


\yii\web\YiiAsset::register($this);
?>
<div class="borrowedbooks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-3">
            <?php
            $img = Storedbooks::find()
                ->where(['id' => $model->idbook])
                ->one();
            $authors = Authors::find()
                ->where(['id' => $img->authorid])
                ->one();
            $users = User::find()
                ->where(['id' => $model->iduser])
                ->one();
            ?>
            <?php echo Html::img('/../knihovnakucera/frontend/images/books/'.$img->img, [
                'alt' => 'Nahledovy obrazek knihy',
                'width' => '250px',
                'height' => '350px',

            ]);?>
        </div>
        <div class="col-lg-9">
            <?=

            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'label' => 'Název',
                        'value' => $img->name,
                    ],
                    [
                        'label' => 'Žánr',
                        'value' => $img->genre,
                    ],
                    [
                        'label' => 'Autor',
                        'value' => $authors->jmeno." ".$authors->prijmeni,
                    ],
                    [
                        'label' => 'Stav zapůjčení',
                        'value' => 'Vypůjčené',
                    ],
                    [
                        'label' => 'Vypůjčil',
                        'value' => $users->username,
                    ],
                    [
                        'label' => 'Vypůjčené od',
                        'value' => function($model){
                            $date = new DateTime($model->fromdate);
                            return $date->format('d.m.Y');
                        },
                    ],
                    [
                        'label' => 'Vypůjčené do',
                        'value' => function($model){
                            $date = new DateTime($model->untildate);
                            return $date->format('d.m.Y');
                        },
                    ],
                ],

            ]) ?>

            <?=
            Html::a('Vrátit knihu', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-warning',
                'data' => [
                    'confirm' => 'Opravdu chcete vrátit tuto knihu?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('Zpět', ['index'], ['class'=>'btn btn-secondary']) ?>
        </div>
    </div>

</div>
