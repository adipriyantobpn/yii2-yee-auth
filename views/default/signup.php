<?php

use yeesoft\Yee;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var yeesoft\auth\models\forms\RegistrationForm $model
 */
$this->title = Yee::t('front', 'Signup');
?>

<div id="signup-wrapper">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= $this->title ?></h3>
                </div>
                <div class="panel-body">

                    <?php
                    $form = ActiveForm::begin([
                        'id' => 'signup',
                        'validateOnBlur' => false,
                        'options' => ['autocomplete' => 'off'],
                    ]);
                    ?>

                    <?= $form->field($model, 'username')->textInput(['maxlength' => 50]) ?>

                    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255]) ?>

                    <?= $form->field($model, 'repeat_password')->passwordInput(['maxlength' => 255]) ?>

                    <?=
                    $form->field($model, 'captcha')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-sm-3">{image}</div><div class="col-sm-3">{input}</div></div>',
                        'captchaAction' => [\yii\helpers\Url::to('/auth/captcha')]
                    ])
                    ?>

                    <?= Html::submitButton(Yee::t('front', 'Signup'), ['class' => 'btn btn-lg btn-primary btn-block']) ?>

                    <div class="row registration-block">
                        <div class="col-sm-6">
                            <?= Html::a(Yee::t('front', "Login"), ['default/login']) ?>
                        </div>
                        <div class="col-sm-6 text-right">
                            <?= Html::a(Yee::t('front', "Forgot password ?"), ['default/reset-password']) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$css = <<<CSS

#signup-wrapper {
	position: relative;
	top: 30%;
}
#signup-wrapper .registration-block {
	margin-top: 15px;
}
CSS;

$this->registerCss($css);
?>


















