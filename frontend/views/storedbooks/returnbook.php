<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Authors;
use frontend\assets\AppAsset;
use frontend\models\Borrowedbooks;

/* @var $this yii\web\View */
/* @var $model frontend\models\Storedbooks */
/* @var $modelPujcene frontend\models\Borrowedbooks */

$this->title = $model->name;
\yii\web\YiiAsset::register($this);
?>
    <div class="storedbooks-view">

        <h1><?= Html::encode($this->title) ?></h1>

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
                <?=

                DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'name',
                        'genre',
                        [
                            'label' => 'Stav zapůjčení',
                            'value' => ($model->borrowed == 0) ? "Volné" : "Vypůjčené",
                        ],
                        [
                            'label' => 'Vypůjčené od',
                            'value' => function($model){
                                $modelPujcene=Borrowedbooks::findOne(['idbook' => $model->id]);
                                $date = new DateTime($modelPujcene->fromdate);
                                return $date->format('d.m.Y');;
                            },
                        ],
                        [
                            'label' => 'Vypůjčené do',
                            'value' => function($model){
                                $modelPujcene=Borrowedbooks::findOne(['idbook' => $model->id]);
                                $date = new DateTime($modelPujcene->untildate);
                                return $date->format('d.m.Y');;
                            },
                        ],
                        [
                            'label' => 'Autor',
                            'value' => $author->jmeno." ".$author->prijmeni,
                        ],
                    ],

                ]) ?>

                <?=
                Html::a('Vrátit knihu', ['vratit', 'id' => $model->id], [
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
<?php
