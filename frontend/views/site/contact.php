<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\ContactForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Kontaktujte nás!';
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-5">
            <p>
                V případě, že nám potřebujete něco nahlásit nebo oznámit neváhejte a využijte formulář níže!<br>
                Vaší zprávu zpracujeme do pár hodin od obdržení.
                <br><br>
                Pokud nás budete chtít navštívit osobně, tak máte možnost na naší pobočce, která je vyznačená na mapě vpravo.
            </p>
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>


                <div class="form-group">
                    <?= Html::submitButton('Odeslat zprávu', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-lg-5">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2607.146187069297!2d16.605414999999997!3d49.1977863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4712945a94ec9f59%3A0x33c19868bcd724a1!2sKnihy%20Dobrovsk%C3%BD!5e0!3m2!1scs!2scz!4v1657922101014!5m2!1scs!2scz" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

</div>
