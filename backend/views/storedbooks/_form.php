<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Authors;
use frontend\models\Storedbooks;

/* @var $this yii\web\View */
/* @var $model frontend\models\Storedbooks */
/* @var $modela frontend\models\Storedbooks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="storedbooks-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
        echo $form->field($model, 'genre')->dropDownList([
            'Fantasy' => 'Fantasy',
            'Sci-fi' => 'Sci-fi',
            'Dokumenty' => 'Dokumenty',
            'Romantické' => 'Romantické',
            'Cestopisy' => 'Cestopisy',
            'Próza' => 'Próza',
            'Povídky' => 'Povídky',
            'Poezie' => 'Poezie',
            'Komiks' => 'Komiks',
            'Drama' => 'Drama',
            'Báje, mýty, pověstí' => 'Báje, mýty, pověstí',
            'Literatura pro děti' => 'Literatura pro děti',
            'Horor' => 'Horor',
            'Detektivky' => 'Detektivky',
        ],
        ['prompt'=>'Vyberte žánr knihy']
        );
    ?>

    <?php
        //tato metoda slouzi k vypisu select menu, ktere ma jako jednotlive optiony vsechny autory z databaze autoru
        $authors = Authors::find()
            ->orderBy('id')
            ->all();

        $authorsMap = ArrayHelper::map(
            $authors,'id',
            function ($authors) {
                return $authors->getFullName();
            }
        );
        
        $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        if(strpos($url,'create') != true){
            $pom=Storedbooks::findOne(['id' => $_GET['id']]);
            $modela->id = $pom->authorid;
        }
        else{
            $modela->id = '';
        }
        echo $form->field($modela, 'id')->dropDownList($authorsMap, ['prompt'=>'Vyberte autora knihy']);
        
        if($model->img == "default.png")
        {
            echo $form->field($model, 'img')->fileInput();
        }
        else{
            echo Html::a('Odstranit fotografii', ['odstranitfoto', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Opravdu chcete odstranit fotografii?',
                    'method' => 'post',
                ],
            ]);
        }
    ?>

    <div class="form-group" style="margin-top:20px;">
        <?= Html::submitButton('Potvrdit akci', ['class' => 'btn btn-success']) ?>

        <?= Html::a('Zpět', ['index'], ['class'=>'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
