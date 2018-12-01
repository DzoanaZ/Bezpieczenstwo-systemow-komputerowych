<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1>Logowanie</h1>

    <p>Zaloguj się:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true] )->label('Login') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Hasło') ?>

                <?= $form->field($model, 'rememberMe')->checkbox()->checkbox(['label' => 'Zapamiętaj mnie']) ?>

                <div class="form-group">
                    <?= Html::submitButton('Zaloguj', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
