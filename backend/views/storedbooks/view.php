<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Authors;
use frontend\models\Borrowedbooks;

/* @var $this yii\web\View */
/* @var $model frontend\models\Storedbooks */
/* @var $modela frontend\models\Borrowedbooks */

$this->title = $model->name;
\yii\web\YiiAsset::register($this);
?>
<div class="storedbooks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Upravit knihu', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php
            $modela=Borrowedbooks::findOne(['idbook' => $model->id]);
            if(!$modela)
            {
                echo Html::a('Odstranit knihu', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Jste si jistí, že chcete odstranit knihu?',
                            'method' => 'post',
                        ],
                    ]);
            }
            else
            {
                echo Html::button('Nelze odstranit knihu', ['class' => 'btn disabled btn-danger']);
            }
        ?>
    </p>
    <div class="row">
        <div class="col-lg-3">
            <?php
            $author = Authors::find()
            ->where(['id' => $model->authorid])
            ->one();
            ?>
            <?php echo Html::img('/../knihovnakucera/frontend/images/books/'.$model->img, [
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
