<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BorrowedbooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Evidence půjčených knih';
?>
<div class="borrowedbooks-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'idbook',

                'value' => 'bookLabel',

            ],
            [
                'attribute' => 'iduser',

                'value' => 'userLabel',

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
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
