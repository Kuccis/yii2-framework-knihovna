<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Authors */

$this->title = "Autor: ".$model->jmeno." ".$model->prijmeni;
\yii\web\YiiAsset::register($this);
?>
<div class="authors-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Upravit autora', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Odstranit autora', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Jste si jistí, že chcete odstranit autora/ku '.$model->jmeno." ".$model->prijmeni."?",
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="row">
        <div class="col-lg-3">
            <?php echo Html::img('/../knihovnakucera/images/authors/'.$model->img, [
            'alt' => 'Nahledovy obrazek knihy',
            'width' => '250px',
            'height' => '300px',

            ]);?>
        </div>
        <div class="col-lg-9">
          <?= DetailView::widget([
              'model' => $model,
              'attributes' => [
                  'jmeno',
                  'prijmeni',
              ],
          ]) ?>
       </div>
    </div>
    <br>
    <?= Html::a('Zpět', ['index'], ['class'=>'btn btn-secondary']) ?>

</div>
