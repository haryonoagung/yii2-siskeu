<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Las */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="las-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_ls')->textInput() ?>

    <?= $form->field($model, 'berkas_id_berkas')->textInput() ?>

    <?= $form->field($model, 'tanggal_masuk')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ '-' => '-', 'lengkap' => 'Lengkap', 'tidak lengkap' => 'Tidak lengkap', '' => '', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'proses')->dropDownList([ '-' => '-', 'KPPN' => 'KPPN', '' => '', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
