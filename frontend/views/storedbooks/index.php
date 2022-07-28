<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use rmrevin\yii\fontawesome\FA;
use frontend\models\Storedbooks;
use frontend\models\Borrowedbooks;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\StoredbooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model frontend\models\Storedbooks */
/* @var $modelPujcene frontend\models\Borrowedbooks */

rmrevin\yii\fontawesome\AssetBundle::register($this);

$this->title = 'Knihovna';
?>
<div class="storedbooks-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Seznam autorů', ['/authors/index'], ['class' => 'btn btn-success']) ?>
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
                'header' => ' ',

                'content' => function($model) {
                    return Html::a(FA::icon('eye').' Zobrazit', ['view','id' => $model->id]);
                }
            ],
            [
                'header' => ' ',

                'content' => function($model) {
                    $modelPujcene=Borrowedbooks::findOne(['idbook' => $model->id]);
                    if(empty($modelPujcene)) {
                        return Html::a(FA::icon('s fa-archive') . ' Půjčit knihu', ['borrow', 'id' => $model->id], ['class' => 'btn btn-link', 'style' => 'padding:0']);
                    }
                    else if(!empty($modelPujcene) && Yii::$app->user->getId() != $modelPujcene->iduser) {
                        return Html::button(FA::icon('s fa-archive') . ' Půjčit knihu', ['class' => 'btn btn-link disabled', 'style' => 'padding:0']);
                    }
                    else if(Yii::$app->user->getId() == $modelPujcene->iduser){
                        return Html::a(FA::icon('s fa-archive') . ' Vrátit knihu', ['returnbook', 'id' => $model->id], ['class' => 'btn btn-link', 'style' => 'padding:0']);
                    }
                }
            ],
        ],
    ]); ?>


</div>
