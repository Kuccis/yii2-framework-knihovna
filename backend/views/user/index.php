<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use rmrevin\yii\fontawesome\FA;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

rmrevin\yii\fontawesome\AssetBundle::register($this);

$this->title = 'Uživatelé';
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            'email:email',
            [
                'header' => ' ',

                'content' => function($model) {
                    return Html::a(FA::icon('eye').' Zobrazit', ['view','id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
