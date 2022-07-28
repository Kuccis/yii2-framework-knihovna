<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use rmrevin\yii\fontawesome\FA;
use frontend\models\Borrowedbooks;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\StoredbooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model frontend\models\Storedbooks */

rmrevin\yii\fontawesome\AssetBundle::register($this);

$this->title = 'Knihovna';
?>
<div class="storedbooks-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Přidat knihu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'genre',
            [
                'attribute' => 'borrowedcount',

                'content' => function($model) {
                    return $model->borrowedcount."x";
                }

            ],
            [
                'attribute' => 'authorid',

                'value' => 'authorLabel',

            ],
            [
                'label' => 'Stav zapůjčení',

                'content' => function($model) {
                    $modela = Borrowedbooks::findOne(['idbook' => $model->id]);
                    if($modela)
                        return "Vypůjčeno";
                    else
                        return "Volné";
                }
            ],
            [
                'header' => ' ',
                'content' => function($model) {
                    return Html::a(FA::icon('eye').' Zobrazit', ['view','id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
