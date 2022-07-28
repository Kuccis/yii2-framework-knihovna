<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use frontend\models\Borrowedbooks;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $borrowed frontend\models\Borrowedbooks */
/* @var $book frontend\models\Storedbooks */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Uživatel-podrobnosti';
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1>Uživatel: <?=$model->username?></h1>

    <p>
        <?php
            $modela=Borrowedbooks::findOne(['iduser' => $model->id]);
            if(!$modela)
            {
                echo Html::a('Odstranit uživatele', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Jste si jistí, že chcete odstranit uživatele?',
                            'method' => 'post',
                        ],
                    ]);
            }
            else
            {
                echo Html::button('Nelze odstranit uživatele', ['class' => 'btn disabled btn-danger']);
            }
        ?>
        <?= Html::a('Zpět', ['index'], ['class'=>'btn btn-secondary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email:email',
        ],
    ]) ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <br>
                <h3>Zapůjčené knihy</h3>
                <?php
                        $borrowed = \frontend\models\Borrowedbooks::find()
                            ->where(['iduser' => $model->id]);

                        $dataProvider = new ActiveDataProvider([
                            'query' => $borrowed,
                            'pagination' => [
                                'pageSize' => 20,
                            ],
                        ]);?>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                [
                                    'attribute' => 'idbook',

                                    'value' => 'bookLabel',

                                ],
                                [
                                    'attribute' => 'fromdate',

                                    'value' => function($model){
                                        $date = new DateTime($model->fromdate);
                                        return $date->format('d.m.Y');;
                                    },

                                ],
                                [
                                    'attribute' => 'untildate',

                                    'value' => function($model){
                                        $date = new DateTime($model->untildate);
                                        return $date->format('d.m.Y');;
                                    },

                                ],
                            ],
                        ]);
                        ?>

            </div>
        </div>
    </div>

</div>
