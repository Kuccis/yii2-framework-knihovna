<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use rmrevin\yii\fontawesome\FA;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AuthorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

rmrevin\yii\fontawesome\AssetBundle::register($this);

$this->title = 'Přidat autora do seznamu';
?>
<div class="authors-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Přidat autora', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'jmeno',
            'prijmeni',
            [
                'header' => ' ',
                'content' => function($model) {
                    return Html::a(FA::icon('eye').' Zobrazit', ['view','id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
