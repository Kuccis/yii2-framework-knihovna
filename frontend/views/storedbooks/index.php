<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\StoredbooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model frontend\models\Storedbooks */

$this->title = 'Knihovna';
?>
<div class="storedbooks-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Přidat knihu', ['create'], ['class' => 'btn btn-success']) ?>

        <?= Html::a('Správa autorů', ['/authors/index'], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'genre',
            [
                'attribute' => 'borrowed',

                'filter' => [0=>'Volné', 1=>'Vypůjčené'],

                'value' => 'borrowedLabel',

            ],
            [
                'attribute' => 'authorid',

                'value' => 'authorLabel',

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
