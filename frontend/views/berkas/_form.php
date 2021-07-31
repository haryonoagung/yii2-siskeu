<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Berkas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="berkas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_mak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_berkas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nominal')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
